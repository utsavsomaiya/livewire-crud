<?php

namespace Database\Factories;

use App\Enums\ChannelStatus;
use App\Models\Channel;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucwords(fake()->words(random_int(5, 8), true)),
            'description' => fake()->sentences(5, true),
            'status' => ChannelStatus::Draft->value,
            'owner_id' => fn () => User::factory()->create()->id,
        ];
    }

    public function configure(): ChannelFactory
    {
        return $this->afterCreating(function (Channel $channel) {
            try {
                $channel
                    ->addMediaFromUrl(DatabaseSeeder::IMAGE_URL)
                    ->toMediaCollection('channel-images');
            } catch (UnreachableUrl $exception) {
                return;
            }
        });
    }
}
