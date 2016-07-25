<?php

namespace Arthem\GoogleApi\Domain\Place;

use Arthem\GoogleApi\Domain\Place\VO\AddressComponentCollection;
use Arthem\GoogleApi\Domain\Place\VO\FormattedAddress;
use Arthem\GoogleApi\Domain\Place\VO\FormattedPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Icon;
use Arthem\GoogleApi\Domain\Place\VO\InternationalPhoneNumber;
use Arthem\GoogleApi\Domain\Place\VO\Location;
use Arthem\GoogleApi\Domain\Place\VO\OpeningHours;
use Arthem\GoogleApi\Domain\Place\VO\Photo;
use Arthem\GoogleApi\Domain\Place\VO\PhotoCollection;
use Arthem\GoogleApi\Domain\Place\VO\PlaceId;
use Arthem\GoogleApi\Domain\Place\VO\PlaceName;
use Arthem\GoogleApi\Domain\Place\VO\TypeCollection;
use Arthem\GoogleApi\Domain\Place\VO\Url;
use Arthem\GoogleApi\Domain\Place\VO\Vicinity;
use Arthem\GoogleApi\Domain\Place\VO\Website;

class Place
{
    /**
     * @var PlaceId
     */
    private $id;

    /**
     * @var PlaceName
     */
    private $name;

    /**
     * @var Vicinity
     */
    private $vicinity;

    /**
     * @var FormattedAddress
     */
    private $formattedAddress;

    /**
     * @var FormattedPhoneNumber
     */
    private $formattedPhoneNumber;

    /**
     * @var OpeningHours
     */
    private $openingHours;

    /**
     * @var Icon
     */
    private $icon;

    /**
     * @var InternationalPhoneNumber
     */
    private $internationalPhoneNumber;

    /**
     * @var Website
     */
    private $website;

    /**
     * @var Url
     */
    private $url;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var TypeCollection
     */
    private $types;

    /**
     * @var AddressComponentCollection
     */
    private $addressComponents;

    /**
     * @var PhotoCollection
     */
    private $photos;

    public function __construct()
    {
        $this->types = new TypeCollection();
        $this->addressComponents = new AddressComponentCollection();
        $this->photos = new PhotoCollection();
    }

    /**
     * @return PlaceId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param PlaceId $id
     *
     * @return $this
     */
    public function setId(PlaceId $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return PlaceName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param PlaceName $name
     *
     * @return $this
     */
    public function setName(PlaceName $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Vicinity
     */
    public function getVicinity()
    {
        return $this->vicinity;
    }

    /**
     * @param Vicinity $vicinity
     *
     * @return $this
     */
    public function setVicinity(Vicinity $vicinity = null)
    {
        $this->vicinity = $vicinity;

        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return $this
     */
    public function setLocation(Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return TypeCollection
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param TypeCollection $types
     *
     * @return $this
     */
    public function setTypes(TypeCollection $types)
    {
        $this->types = $types;

        return $this;
    }

    /**
     * @return FormattedAddress
     */
    public function getFormattedAddress()
    {
        return $this->formattedAddress;
    }

    /**
     * @param FormattedAddress $formattedAddress
     *
     * @return $this
     */
    public function setFormattedAddress(FormattedAddress $formattedAddress = null)
    {
        $this->formattedAddress = $formattedAddress;

        return $this;
    }

    /**
     * @return FormattedPhoneNumber
     */
    public function getFormattedPhoneNumber()
    {
        return $this->formattedPhoneNumber;
    }

    /**
     * @param FormattedPhoneNumber $formattedPhoneNumber
     *
     * @return $this
     */
    public function setFormattedPhoneNumber(FormattedPhoneNumber $formattedPhoneNumber = null)
    {
        $this->formattedPhoneNumber = $formattedPhoneNumber;

        return $this;
    }

    /**
     * @return Icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param Icon $icon
     *
     * @return $this
     */
    public function setIcon(Icon $icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return InternationalPhoneNumber
     */
    public function getInternationalPhoneNumber()
    {
        return $this->internationalPhoneNumber;
    }

    /**
     * @param InternationalPhoneNumber $internationalPhoneNumber
     *
     * @return $this
     */
    public function setInternationalPhoneNumber(InternationalPhoneNumber $internationalPhoneNumber = null)
    {
        $this->internationalPhoneNumber = $internationalPhoneNumber;

        return $this;
    }

    /**
     * @return Website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param Website $website
     *
     * @return $this
     */
    public function setWebsite(Website $website = null)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return $this
     */
    public function setUrl(Url $url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return AddressComponentCollection
     */
    public function getAddressComponents()
    {
        return $this->addressComponents;
    }

    /**
     * @param AddressComponentCollection $addressComponents
     *
     * @return $this
     */
    public function setAddressComponents(AddressComponentCollection $addressComponents)
    {
        $this->addressComponents = $addressComponents;

        return $this;
    }

    /**
     * @return PhotoCollection|Photo[]
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param PhotoCollection $photos
     *
     * @return $this
     */
    public function setPhotos(PhotoCollection $photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * @return OpeningHours
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * @param OpeningHours $openingHours
     * @return $this
     */
    public function setOpeningHours(OpeningHours $openingHours = null)
    {
        $this->openingHours = $openingHours;

        return $this;
    }
}
