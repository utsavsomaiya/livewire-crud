<?php

namespace App\Enums;

enum ChannelStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Suspended = 'suspended';
}