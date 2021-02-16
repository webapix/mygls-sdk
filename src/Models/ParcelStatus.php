<?php

namespace Webapix\GLS\Models;

class ParcelStatus
{
    protected const APL_REGISTRATION = 1;
    protected const HUB_OUTBOUND_SCAN = 2;
    protected const DEPOT_ENTRY = 3;
    protected const DELIVERY_LIST_SCAN = 4;
    protected const DELIVERED = 5;
    protected const HUB_STORAGE = 6;
    protected const DEPOT_STORAGE = 7;
    protected const PICKED_UP_BY_RECIPIENT = 8;
    protected const FIXED_DELIVERY = 9;
    protected const HOLIDAY = 11;
    protected const NOTICE_LEFT = 12;
    protected const DEPO_ROUTING_FAILURE = 13;
    protected const CLOSED = 14;
    protected const LACT_OF_TIME = 15;
    protected const LACK_OF_MONEY = 16;
    protected const REFUSED = 17;
    protected const WRONG_ADDRESS = 18;
    protected const UNREACHABLE = 19;
    protected const WRONG_ZIP = 20;
    protected const MISSORTED = 21;
    protected const BACK_TO_HUB = 22;
    protected const BACK_TO_THE_SHIPPER = 23;
    protected const DEPOT_REDELIVERY = 24;
    protected const MISROUTED = 25;
    protected const HUB_INBOUND = 26;
    protected const SMALL_PARCEL = 27;
    protected const HUB_DAMAGED = 28;
    protected const NO_DATA_VAVAILABLE = 29;
    protected const DAMAGED = 30;
    protected const TOTALLY_DAMAGED = 31;
    protected const DELIVERY_IN_THE_EVENING = 32;
    protected const TOO_MANY_WAITING = 33;
    protected const DELIVERY_TOO_LATE = 34;
    protected const NOT_ORDERED = 35;
    protected const CLOSED_ENTRANCE = 36;
    protected const CENTRAL_ORDERED = 37;
    protected const NO_DELIVERY_NOTE = 38;
    protected const DO_NOT_CONFIRM_THE_DELIVERY_NOTE = 39;
    protected const LOST = 43;
    protected const NOT_SYSTEMLIKE_PARCEL = 44;
    protected const CHANGE_OF_DELIVERY_ADDRESS = 46;
    protected const TRANSFERRED_TO_SUBCONTRACTOR = 47;
    protected const DATA_SENT = 51;
    protected const COD_DATA_SENT = 52;
    protected const DEPOT_TRANSIT = 53;
    protected const PARCELSHOP_DEPOSIT = 55;
    protected const PARCELSHOP_STORAGE = 56;
    protected const PARCELSHOP_RETURN = 57;
    protected const DELIVERED_TO_NEIGHBOUR = 58;
    protected const CHANGD_DLIVERYADRES = 80;
    protected const RQINFO_NORMAL = 81;
    protected const REQFWD_MISROUTED = 82;
    protected const PSPR_REGISTERED = 83;
    protected const PSPR_PRINTED = 84;
    protected const PSPR_ON_ROLLKARTE = 85;
    protected const PSPR_PICKED_UP = 86;
    protected const PSPR_PARCEL = 87;
    protected const NOT_READY = 88;
    protected const INSUFFICIENT_LABEL = 89;
    protected const POSTED_VIA_DIFFERENT_MODE = 90;
    protected const PSPR_CANCELLED = 91;
    protected const CSOMAGPONT_UPDATE = 94;

    /**
     * @var string
     */
    protected $depotCity;

    /**
     * @var string
     */
    protected $depotNumber;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDate;

    /**
     * @var string
     */
    protected $statusDescription;

    /**
     * @var string
     */
    protected $statusInfo;

    public static function fromArray(array $data): self
    {
        $parcelStatus = new static();

        $parcelStatus->depotCity = (string) $data['DepotCity'];
        $parcelStatus->depotNumber = (string) $data['DepotNumber'];
        $parcelStatus->statusCode = (string) $data['StatusCode'];
        $parcelStatus->statusDate = (string) $data['StatusDate'];
        $parcelStatus->statusDescription = (string) $data['StatusDescription'];
        $parcelStatus->statusInfo = (string) $data['StatusInfo'];

        return $parcelStatus;
    }

    public function depotCity(): string
    {
        return $this->depotCity;
    }

    public function depotNumber(): string
    {
        return $this->depotNumber;
    }

    public function statusCode(): string
    {
        return $this->statusCode;
    }

    public function statusDate(): string
    {
        return $this->statusDate;
    }

    public function statusDescription(): string
    {
        return $this->statusDescription;
    }

    public function statusInfo(): string
    {
        return $this->statusInfo;
    }
}
