<?php

namespace Webapix\GLS\Models;

class ParcelStatus
{
    protected const STATUS_CODE_APL_REGISTRATION = 1;
    protected const STATUS_CODE_HUB_OUTBOUND_SCAN = 2;
    protected const STATUS_CODE_DEPOT_ENTRY = 3;
    protected const STATUS_CODE_DELIVERY_LIST_SCAN = 4;
    protected const STATUS_CODE_DELIVERED = 5;
    protected const STATUS_CODE_HUB_STORAGE = 6;
    protected const STATUS_CODE_DEPOT_STORAGE = 7;
    protected const STATUS_CODE_PICKED_UP_BY_RECIPIENT = 8;
    protected const STATUS_CODE_FIXED_DELIVERY = 9;
    protected const STATUS_CODE_HOLIDAY = 11;
    protected const STATUS_CODE_NOTICE_LEFT = 12;
    protected const STATUS_CODE_DEPO_ROUTING_FAILURE = 13;
    protected const STATUS_CODE_CLOSED = 14;
    protected const STATUS_CODE_LACT_OF_TIME = 15;
    protected const STATUS_CODE_LACK_OF_MONEY = 16;
    protected const STATUS_CODE_REFUSED = 17;
    protected const STATUS_CODE_WRONG_ADDRESS = 18;
    protected const STATUS_CODE_UNREACHABLE = 19;
    protected const STATUS_CODE_WRONG_ZIP = 20;
    protected const STATUS_CODE_MISSORTED = 21;
    protected const STATUS_CODE_BACK_TO_HUB = 22;
    protected const STATUS_CODE_BACK_TO_THE_SHIPPER = 23;
    protected const STATUS_CODE_DEPOT_REDELIVERY = 24;
    protected const STATUS_CODE_MISROUTED = 25;
    protected const STATUS_CODE_HUB_INBOUND = 26;
    protected const STATUS_CODE_SMALL_PARCEL = 27;
    protected const STATUS_CODE_HUB_DAMAGED = 28;
    protected const STATUS_CODE_NO_DATA_VAVAILABLE = 29;
    protected const STATUS_CODE_DAMAGED = 30;
    protected const STATUS_CODE_TOTALLY_DAMAGED = 31;
    protected const STATUS_CODE_DELIVERY_IN_THE_EVENING = 32;
    protected const STATUS_CODE_TOO_MANY_WAITING = 33;
    protected const STATUS_CODE_DELIVERY_TOO_LATE = 34;
    protected const STATUS_CODE_NOT_ORDERED = 35;
    protected const STATUS_CODE_CLOSED_ENTRANCE = 36;
    protected const STATUS_CODE_CENTRAL_ORDERED = 37;
    protected const STATUS_CODE_NO_DELIVERY_NOTE = 38;
    protected const STATUS_CODE_DO_NOT_CONFIRM_THE_DELIVERY_NOTE = 39;
    protected const STATUS_CODE_LOST = 43;
    protected const STATUS_CODE_NOT_SYSTEMLIKE_PARCEL = 44;
    protected const STATUS_CODE_CHANGE_OF_DELIVERY_ADDRESS = 46;
    protected const STATUS_CODE_TRANSFERRED_TO_SUBCONTRACTOR = 47;
    protected const STATUS_CODE_DATA_SENT = 51;
    protected const STATUS_CODE_COD_DATA_SENT = 52;
    protected const STATUS_CODE_DEPOT_TRANSIT = 53;
    protected const STATUS_CODE_PARCELSHOP_DEPOSIT = 55;
    protected const STATUS_CODE_PARCELSHOP_STORAGE = 56;
    protected const STATUS_CODE_PARCELSHOP_RETURN = 57;
    protected const STATUS_CODE_DELIVERED_TO_NEIGHBOUR = 58;
    protected const STATUS_CODE_CHANGD_DLIVERYADRES = 80;
    protected const STATUS_CODE_RQINFO_NORMAL = 81;
    protected const STATUS_CODE_REQFWD_MISROUTED = 82;
    protected const STATUS_CODE_PSPR_REGISTERED = 83;
    protected const STATUS_CODE_PSPR_PRINTED = 84;
    protected const STATUS_CODE_PSPR_ON_ROLLKARTE = 85;
    protected const STATUS_CODE_PSPR_PICKED_UP = 86;
    protected const STATUS_CODE_PSPR_PARCEL = 87;
    protected const STATUS_CODE_NOT_READY = 88;
    protected const STATUS_CODE_INSUFFICIENT_LABEL = 89;
    protected const STATUS_CODE_POSTED_VIA_DIFFERENT_MODE = 90;
    protected const STATUS_CODE_PSPR_CANCELLED = 91;
    protected const STATUS_CODE_CSOMAGPONT_UPDATE = 94;

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
