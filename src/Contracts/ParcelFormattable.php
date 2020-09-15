<?php

namespace Webapix\GLS\Contracts;

use Webapix\GLS\Parcel;

interface ParcelFormattable
{
    public function toParcel(): Parcel;
}
