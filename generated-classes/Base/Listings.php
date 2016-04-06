<?php

namespace Base;

use \ListingsQuery as ChildListingsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ListingsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'listings' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Listings implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ListingsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the frontwidth field.
     *
     * @var        int
     */
    protected $frontwidth;

    /**
     * The value for the rearwidth field.
     *
     * @var        int
     */
    protected $rearwidth;

    /**
     * The value for the size field.
     *
     * @var        int
     */
    protected $size;

    /**
     * The value for the brand field.
     *
     * @var        string
     */
    protected $brand;

    /**
     * The value for the studpattern1 field.
     *
     * @var        int
     */
    protected $studpattern1;

    /**
     * The value for the studpattern2 field.
     *
     * @var        int
     */
    protected $studpattern2;

    /**
     * The value for the frontoffset field.
     *
     * @var        int
     */
    protected $frontoffset;

    /**
     * The value for the rearoffset field.
     *
     * @var        int
     */
    protected $rearoffset;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the price field.
     *
     * @var        int
     */
    protected $price;

    /**
     * The value for the swaps field.
     *
     * @var        string
     */
    protected $swaps;

    /**
     * The value for the ownerid field.
     *
     * @var        int
     */
    protected $ownerid;

    /**
     * The value for the ownerlocation field.
     *
     * @var        string
     */
    protected $ownerlocation;

    /**
     * The value for the owneremail field.
     *
     * @var        string
     */
    protected $owneremail;

    /**
     * The value for the ownerphone field.
     *
     * @var        string
     */
    protected $ownerphone;

    /**
     * The value for the time field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        \DateTime
     */
    protected $time;

    /**
     * The value for the mainimage field.
     *
     * Note: this column has a database default value of: 'default.png'
     * @var        string
     */
    protected $mainimage;

    /**
     * The value for the thumb1 field.
     *
     * Note: this column has a database default value of: 'default.png'
     * @var        string
     */
    protected $thumb1;

    /**
     * The value for the thumb2 field.
     *
     * Note: this column has a database default value of: 'default.png'
     * @var        string
     */
    protected $thumb2;

    /**
     * The value for the thumb3 field.
     *
     * Note: this column has a database default value of: 'default.png'
     * @var        string
     */
    protected $thumb3;

    /**
     * The value for the thumb4 field.
     *
     * Note: this column has a database default value of: 'default.png'
     * @var        string
     */
    protected $thumb4;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->mainimage = 'default.png';
        $this->thumb1 = 'default.png';
        $this->thumb2 = 'default.png';
        $this->thumb3 = 'default.png';
        $this->thumb4 = 'default.png';
    }

    /**
     * Initializes internal state of Base\Listings object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Listings</code> instance.  If
     * <code>obj</code> is an instance of <code>Listings</code>, delegates to
     * <code>equals(Listings)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Listings The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [frontwidth] column value.
     *
     * @return int
     */
    public function getFrontwidth()
    {
        return $this->frontwidth;
    }

    /**
     * Get the [rearwidth] column value.
     *
     * @return int
     */
    public function getRearwidth()
    {
        return $this->rearwidth;
    }

    /**
     * Get the [size] column value.
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the [brand] column value.
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Get the [studpattern1] column value.
     *
     * @return int
     */
    public function getStudpattern1()
    {
        return $this->studpattern1;
    }

    /**
     * Get the [studpattern2] column value.
     *
     * @return int
     */
    public function getStudpattern2()
    {
        return $this->studpattern2;
    }

    /**
     * Get the [frontoffset] column value.
     *
     * @return int
     */
    public function getFrontoffset()
    {
        return $this->frontoffset;
    }

    /**
     * Get the [rearoffset] column value.
     *
     * @return int
     */
    public function getRearoffset()
    {
        return $this->rearoffset;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [price] column value.
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the [swaps] column value.
     *
     * @return string
     */
    public function getSwaps()
    {
        return $this->swaps;
    }

    /**
     * Get the [ownerid] column value.
     *
     * @return int
     */
    public function getOwnerid()
    {
        return $this->ownerid;
    }

    /**
     * Get the [ownerlocation] column value.
     *
     * @return string
     */
    public function getOwnerlocation()
    {
        return $this->ownerlocation;
    }

    /**
     * Get the [owneremail] column value.
     *
     * @return string
     */
    public function getOwneremail()
    {
        return $this->owneremail;
    }

    /**
     * Get the [ownerphone] column value.
     *
     * @return string
     */
    public function getOwnerphone()
    {
        return $this->ownerphone;
    }

    /**
     * Get the [optionally formatted] temporal [time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTime($format = NULL)
    {
        if ($format === null) {
            return $this->time;
        } else {
            return $this->time instanceof \DateTime ? $this->time->format($format) : null;
        }
    }

    /**
     * Get the [mainimage] column value.
     *
     * @return string
     */
    public function getMainimage()
    {
        return $this->mainimage;
    }

    /**
     * Get the [thumb1] column value.
     *
     * @return string
     */
    public function getThumb1()
    {
        return $this->thumb1;
    }

    /**
     * Get the [thumb2] column value.
     *
     * @return string
     */
    public function getThumb2()
    {
        return $this->thumb2;
    }

    /**
     * Get the [thumb3] column value.
     *
     * @return string
     */
    public function getThumb3()
    {
        return $this->thumb3;
    }

    /**
     * Get the [thumb4] column value.
     *
     * @return string
     */
    public function getThumb4()
    {
        return $this->thumb4;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ListingsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[ListingsTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [frontwidth] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setFrontwidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->frontwidth !== $v) {
            $this->frontwidth = $v;
            $this->modifiedColumns[ListingsTableMap::COL_FRONTWIDTH] = true;
        }

        return $this;
    } // setFrontwidth()

    /**
     * Set the value of [rearwidth] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setRearwidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rearwidth !== $v) {
            $this->rearwidth = $v;
            $this->modifiedColumns[ListingsTableMap::COL_REARWIDTH] = true;
        }

        return $this;
    } // setRearwidth()

    /**
     * Set the value of [size] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setSize($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->size !== $v) {
            $this->size = $v;
            $this->modifiedColumns[ListingsTableMap::COL_SIZE] = true;
        }

        return $this;
    } // setSize()

    /**
     * Set the value of [brand] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setBrand($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->brand !== $v) {
            $this->brand = $v;
            $this->modifiedColumns[ListingsTableMap::COL_BRAND] = true;
        }

        return $this;
    } // setBrand()

    /**
     * Set the value of [studpattern1] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setStudpattern1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->studpattern1 !== $v) {
            $this->studpattern1 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_STUDPATTERN1] = true;
        }

        return $this;
    } // setStudpattern1()

    /**
     * Set the value of [studpattern2] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setStudpattern2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->studpattern2 !== $v) {
            $this->studpattern2 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_STUDPATTERN2] = true;
        }

        return $this;
    } // setStudpattern2()

    /**
     * Set the value of [frontoffset] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setFrontoffset($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->frontoffset !== $v) {
            $this->frontoffset = $v;
            $this->modifiedColumns[ListingsTableMap::COL_FRONTOFFSET] = true;
        }

        return $this;
    } // setFrontoffset()

    /**
     * Set the value of [rearoffset] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setRearoffset($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rearoffset !== $v) {
            $this->rearoffset = $v;
            $this->modifiedColumns[ListingsTableMap::COL_REAROFFSET] = true;
        }

        return $this;
    } // setRearoffset()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[ListingsTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [price] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setPrice($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->price !== $v) {
            $this->price = $v;
            $this->modifiedColumns[ListingsTableMap::COL_PRICE] = true;
        }

        return $this;
    } // setPrice()

    /**
     * Set the value of [swaps] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setSwaps($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->swaps !== $v) {
            $this->swaps = $v;
            $this->modifiedColumns[ListingsTableMap::COL_SWAPS] = true;
        }

        return $this;
    } // setSwaps()

    /**
     * Set the value of [ownerid] column.
     *
     * @param int $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setOwnerid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ownerid !== $v) {
            $this->ownerid = $v;
            $this->modifiedColumns[ListingsTableMap::COL_OWNERID] = true;
        }

        return $this;
    } // setOwnerid()

    /**
     * Set the value of [ownerlocation] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setOwnerlocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ownerlocation !== $v) {
            $this->ownerlocation = $v;
            $this->modifiedColumns[ListingsTableMap::COL_OWNERLOCATION] = true;
        }

        return $this;
    } // setOwnerlocation()

    /**
     * Set the value of [owneremail] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setOwneremail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->owneremail !== $v) {
            $this->owneremail = $v;
            $this->modifiedColumns[ListingsTableMap::COL_OWNEREMAIL] = true;
        }

        return $this;
    } // setOwneremail()

    /**
     * Set the value of [ownerphone] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setOwnerphone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ownerphone !== $v) {
            $this->ownerphone = $v;
            $this->modifiedColumns[ListingsTableMap::COL_OWNERPHONE] = true;
        }

        return $this;
    } // setOwnerphone()

    /**
     * Sets the value of [time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->time !== null || $dt !== null) {
            if ($this->time === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->time->format("Y-m-d H:i:s")) {
                $this->time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ListingsTableMap::COL_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setTime()

    /**
     * Set the value of [mainimage] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setMainimage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mainimage !== $v) {
            $this->mainimage = $v;
            $this->modifiedColumns[ListingsTableMap::COL_MAINIMAGE] = true;
        }

        return $this;
    } // setMainimage()

    /**
     * Set the value of [thumb1] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setThumb1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb1 !== $v) {
            $this->thumb1 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_THUMB1] = true;
        }

        return $this;
    } // setThumb1()

    /**
     * Set the value of [thumb2] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setThumb2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb2 !== $v) {
            $this->thumb2 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_THUMB2] = true;
        }

        return $this;
    } // setThumb2()

    /**
     * Set the value of [thumb3] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setThumb3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb3 !== $v) {
            $this->thumb3 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_THUMB3] = true;
        }

        return $this;
    } // setThumb3()

    /**
     * Set the value of [thumb4] column.
     *
     * @param string $v new value
     * @return $this|\Listings The current object (for fluent API support)
     */
    public function setThumb4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb4 !== $v) {
            $this->thumb4 = $v;
            $this->modifiedColumns[ListingsTableMap::COL_THUMB4] = true;
        }

        return $this;
    } // setThumb4()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->mainimage !== 'default.png') {
                return false;
            }

            if ($this->thumb1 !== 'default.png') {
                return false;
            }

            if ($this->thumb2 !== 'default.png') {
                return false;
            }

            if ($this->thumb3 !== 'default.png') {
                return false;
            }

            if ($this->thumb4 !== 'default.png') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ListingsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ListingsTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ListingsTableMap::translateFieldName('Frontwidth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->frontwidth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ListingsTableMap::translateFieldName('Rearwidth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rearwidth = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ListingsTableMap::translateFieldName('Size', TableMap::TYPE_PHPNAME, $indexType)];
            $this->size = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ListingsTableMap::translateFieldName('Brand', TableMap::TYPE_PHPNAME, $indexType)];
            $this->brand = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ListingsTableMap::translateFieldName('Studpattern1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->studpattern1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ListingsTableMap::translateFieldName('Studpattern2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->studpattern2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ListingsTableMap::translateFieldName('Frontoffset', TableMap::TYPE_PHPNAME, $indexType)];
            $this->frontoffset = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ListingsTableMap::translateFieldName('Rearoffset', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rearoffset = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ListingsTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ListingsTableMap::translateFieldName('Price', TableMap::TYPE_PHPNAME, $indexType)];
            $this->price = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ListingsTableMap::translateFieldName('Swaps', TableMap::TYPE_PHPNAME, $indexType)];
            $this->swaps = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ListingsTableMap::translateFieldName('Ownerid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ownerid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ListingsTableMap::translateFieldName('Ownerlocation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ownerlocation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ListingsTableMap::translateFieldName('Owneremail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->owneremail = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ListingsTableMap::translateFieldName('Ownerphone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ownerphone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ListingsTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : ListingsTableMap::translateFieldName('Mainimage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mainimage = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : ListingsTableMap::translateFieldName('Thumb1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : ListingsTableMap::translateFieldName('Thumb2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : ListingsTableMap::translateFieldName('Thumb3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : ListingsTableMap::translateFieldName('Thumb4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb4 = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = ListingsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Listings'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ListingsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildListingsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Listings::setDeleted()
     * @see Listings::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildListingsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ListingsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ListingsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_FRONTWIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'frontwidth';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_REARWIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'rearwidth';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_SIZE)) {
            $modifiedColumns[':p' . $index++]  = 'size';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_BRAND)) {
            $modifiedColumns[':p' . $index++]  = 'brand';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_STUDPATTERN1)) {
            $modifiedColumns[':p' . $index++]  = 'studpattern1';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_STUDPATTERN2)) {
            $modifiedColumns[':p' . $index++]  = 'studpattern2';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_FRONTOFFSET)) {
            $modifiedColumns[':p' . $index++]  = 'frontoffset';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_REAROFFSET)) {
            $modifiedColumns[':p' . $index++]  = 'rearoffset';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_PRICE)) {
            $modifiedColumns[':p' . $index++]  = 'price';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_SWAPS)) {
            $modifiedColumns[':p' . $index++]  = 'swaps';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERID)) {
            $modifiedColumns[':p' . $index++]  = 'ownerID';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERLOCATION)) {
            $modifiedColumns[':p' . $index++]  = 'ownerLocation';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNEREMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'ownerEmail';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'ownerPhone';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_MAINIMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'mainImage';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB1)) {
            $modifiedColumns[':p' . $index++]  = 'thumb1';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB2)) {
            $modifiedColumns[':p' . $index++]  = 'thumb2';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB3)) {
            $modifiedColumns[':p' . $index++]  = 'thumb3';
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB4)) {
            $modifiedColumns[':p' . $index++]  = 'thumb4';
        }

        $sql = sprintf(
            'INSERT INTO listings (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'frontwidth':
                        $stmt->bindValue($identifier, $this->frontwidth, PDO::PARAM_INT);
                        break;
                    case 'rearwidth':
                        $stmt->bindValue($identifier, $this->rearwidth, PDO::PARAM_INT);
                        break;
                    case 'size':
                        $stmt->bindValue($identifier, $this->size, PDO::PARAM_INT);
                        break;
                    case 'brand':
                        $stmt->bindValue($identifier, $this->brand, PDO::PARAM_STR);
                        break;
                    case 'studpattern1':
                        $stmt->bindValue($identifier, $this->studpattern1, PDO::PARAM_INT);
                        break;
                    case 'studpattern2':
                        $stmt->bindValue($identifier, $this->studpattern2, PDO::PARAM_INT);
                        break;
                    case 'frontoffset':
                        $stmt->bindValue($identifier, $this->frontoffset, PDO::PARAM_INT);
                        break;
                    case 'rearoffset':
                        $stmt->bindValue($identifier, $this->rearoffset, PDO::PARAM_INT);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'price':
                        $stmt->bindValue($identifier, $this->price, PDO::PARAM_INT);
                        break;
                    case 'swaps':
                        $stmt->bindValue($identifier, $this->swaps, PDO::PARAM_STR);
                        break;
                    case 'ownerID':
                        $stmt->bindValue($identifier, $this->ownerid, PDO::PARAM_INT);
                        break;
                    case 'ownerLocation':
                        $stmt->bindValue($identifier, $this->ownerlocation, PDO::PARAM_STR);
                        break;
                    case 'ownerEmail':
                        $stmt->bindValue($identifier, $this->owneremail, PDO::PARAM_STR);
                        break;
                    case 'ownerPhone':
                        $stmt->bindValue($identifier, $this->ownerphone, PDO::PARAM_STR);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time ? $this->time->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'mainImage':
                        $stmt->bindValue($identifier, $this->mainimage, PDO::PARAM_STR);
                        break;
                    case 'thumb1':
                        $stmt->bindValue($identifier, $this->thumb1, PDO::PARAM_STR);
                        break;
                    case 'thumb2':
                        $stmt->bindValue($identifier, $this->thumb2, PDO::PARAM_STR);
                        break;
                    case 'thumb3':
                        $stmt->bindValue($identifier, $this->thumb3, PDO::PARAM_STR);
                        break;
                    case 'thumb4':
                        $stmt->bindValue($identifier, $this->thumb4, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ListingsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getFrontwidth();
                break;
            case 3:
                return $this->getRearwidth();
                break;
            case 4:
                return $this->getSize();
                break;
            case 5:
                return $this->getBrand();
                break;
            case 6:
                return $this->getStudpattern1();
                break;
            case 7:
                return $this->getStudpattern2();
                break;
            case 8:
                return $this->getFrontoffset();
                break;
            case 9:
                return $this->getRearoffset();
                break;
            case 10:
                return $this->getDescription();
                break;
            case 11:
                return $this->getPrice();
                break;
            case 12:
                return $this->getSwaps();
                break;
            case 13:
                return $this->getOwnerid();
                break;
            case 14:
                return $this->getOwnerlocation();
                break;
            case 15:
                return $this->getOwneremail();
                break;
            case 16:
                return $this->getOwnerphone();
                break;
            case 17:
                return $this->getTime();
                break;
            case 18:
                return $this->getMainimage();
                break;
            case 19:
                return $this->getThumb1();
                break;
            case 20:
                return $this->getThumb2();
                break;
            case 21:
                return $this->getThumb3();
                break;
            case 22:
                return $this->getThumb4();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Listings'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Listings'][$this->hashCode()] = true;
        $keys = ListingsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getFrontwidth(),
            $keys[3] => $this->getRearwidth(),
            $keys[4] => $this->getSize(),
            $keys[5] => $this->getBrand(),
            $keys[6] => $this->getStudpattern1(),
            $keys[7] => $this->getStudpattern2(),
            $keys[8] => $this->getFrontoffset(),
            $keys[9] => $this->getRearoffset(),
            $keys[10] => $this->getDescription(),
            $keys[11] => $this->getPrice(),
            $keys[12] => $this->getSwaps(),
            $keys[13] => $this->getOwnerid(),
            $keys[14] => $this->getOwnerlocation(),
            $keys[15] => $this->getOwneremail(),
            $keys[16] => $this->getOwnerphone(),
            $keys[17] => $this->getTime(),
            $keys[18] => $this->getMainimage(),
            $keys[19] => $this->getThumb1(),
            $keys[20] => $this->getThumb2(),
            $keys[21] => $this->getThumb3(),
            $keys[22] => $this->getThumb4(),
        );
        if ($result[$keys[17]] instanceof \DateTime) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Listings
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ListingsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Listings
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setFrontwidth($value);
                break;
            case 3:
                $this->setRearwidth($value);
                break;
            case 4:
                $this->setSize($value);
                break;
            case 5:
                $this->setBrand($value);
                break;
            case 6:
                $this->setStudpattern1($value);
                break;
            case 7:
                $this->setStudpattern2($value);
                break;
            case 8:
                $this->setFrontoffset($value);
                break;
            case 9:
                $this->setRearoffset($value);
                break;
            case 10:
                $this->setDescription($value);
                break;
            case 11:
                $this->setPrice($value);
                break;
            case 12:
                $this->setSwaps($value);
                break;
            case 13:
                $this->setOwnerid($value);
                break;
            case 14:
                $this->setOwnerlocation($value);
                break;
            case 15:
                $this->setOwneremail($value);
                break;
            case 16:
                $this->setOwnerphone($value);
                break;
            case 17:
                $this->setTime($value);
                break;
            case 18:
                $this->setMainimage($value);
                break;
            case 19:
                $this->setThumb1($value);
                break;
            case 20:
                $this->setThumb2($value);
                break;
            case 21:
                $this->setThumb3($value);
                break;
            case 22:
                $this->setThumb4($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ListingsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setFrontwidth($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRearwidth($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setSize($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBrand($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setStudpattern1($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setStudpattern2($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFrontoffset($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setRearoffset($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDescription($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPrice($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSwaps($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOwnerid($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOwnerlocation($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setOwneremail($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setOwnerphone($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTime($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setMainimage($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setThumb1($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setThumb2($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setThumb3($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setThumb4($arr[$keys[22]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Listings The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ListingsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ListingsTableMap::COL_ID)) {
            $criteria->add(ListingsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_TITLE)) {
            $criteria->add(ListingsTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_FRONTWIDTH)) {
            $criteria->add(ListingsTableMap::COL_FRONTWIDTH, $this->frontwidth);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_REARWIDTH)) {
            $criteria->add(ListingsTableMap::COL_REARWIDTH, $this->rearwidth);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_SIZE)) {
            $criteria->add(ListingsTableMap::COL_SIZE, $this->size);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_BRAND)) {
            $criteria->add(ListingsTableMap::COL_BRAND, $this->brand);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_STUDPATTERN1)) {
            $criteria->add(ListingsTableMap::COL_STUDPATTERN1, $this->studpattern1);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_STUDPATTERN2)) {
            $criteria->add(ListingsTableMap::COL_STUDPATTERN2, $this->studpattern2);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_FRONTOFFSET)) {
            $criteria->add(ListingsTableMap::COL_FRONTOFFSET, $this->frontoffset);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_REAROFFSET)) {
            $criteria->add(ListingsTableMap::COL_REAROFFSET, $this->rearoffset);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_DESCRIPTION)) {
            $criteria->add(ListingsTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_PRICE)) {
            $criteria->add(ListingsTableMap::COL_PRICE, $this->price);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_SWAPS)) {
            $criteria->add(ListingsTableMap::COL_SWAPS, $this->swaps);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERID)) {
            $criteria->add(ListingsTableMap::COL_OWNERID, $this->ownerid);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERLOCATION)) {
            $criteria->add(ListingsTableMap::COL_OWNERLOCATION, $this->ownerlocation);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNEREMAIL)) {
            $criteria->add(ListingsTableMap::COL_OWNEREMAIL, $this->owneremail);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_OWNERPHONE)) {
            $criteria->add(ListingsTableMap::COL_OWNERPHONE, $this->ownerphone);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_TIME)) {
            $criteria->add(ListingsTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_MAINIMAGE)) {
            $criteria->add(ListingsTableMap::COL_MAINIMAGE, $this->mainimage);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB1)) {
            $criteria->add(ListingsTableMap::COL_THUMB1, $this->thumb1);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB2)) {
            $criteria->add(ListingsTableMap::COL_THUMB2, $this->thumb2);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB3)) {
            $criteria->add(ListingsTableMap::COL_THUMB3, $this->thumb3);
        }
        if ($this->isColumnModified(ListingsTableMap::COL_THUMB4)) {
            $criteria->add(ListingsTableMap::COL_THUMB4, $this->thumb4);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        throw new LogicException('The Listings object has no primary key');

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = false;

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns NULL since this table doesn't have a primary key.
     * This method exists only for BC and is deprecated!
     * @return null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * Dummy primary key setter.
     *
     * This function only exists to preserve backwards compatibility.  It is no longer
     * needed or required by the Persistent interface.  It will be removed in next BC-breaking
     * release of Propel.
     *
     * @deprecated
     */
    public function setPrimaryKey($pk)
    {
        // do nothing, because this object doesn't have any primary keys
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return ;
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Listings (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setFrontwidth($this->getFrontwidth());
        $copyObj->setRearwidth($this->getRearwidth());
        $copyObj->setSize($this->getSize());
        $copyObj->setBrand($this->getBrand());
        $copyObj->setStudpattern1($this->getStudpattern1());
        $copyObj->setStudpattern2($this->getStudpattern2());
        $copyObj->setFrontoffset($this->getFrontoffset());
        $copyObj->setRearoffset($this->getRearoffset());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setPrice($this->getPrice());
        $copyObj->setSwaps($this->getSwaps());
        $copyObj->setOwnerid($this->getOwnerid());
        $copyObj->setOwnerlocation($this->getOwnerlocation());
        $copyObj->setOwneremail($this->getOwneremail());
        $copyObj->setOwnerphone($this->getOwnerphone());
        $copyObj->setTime($this->getTime());
        $copyObj->setMainimage($this->getMainimage());
        $copyObj->setThumb1($this->getThumb1());
        $copyObj->setThumb2($this->getThumb2());
        $copyObj->setThumb3($this->getThumb3());
        $copyObj->setThumb4($this->getThumb4());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Listings Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->title = null;
        $this->frontwidth = null;
        $this->rearwidth = null;
        $this->size = null;
        $this->brand = null;
        $this->studpattern1 = null;
        $this->studpattern2 = null;
        $this->frontoffset = null;
        $this->rearoffset = null;
        $this->description = null;
        $this->price = null;
        $this->swaps = null;
        $this->ownerid = null;
        $this->ownerlocation = null;
        $this->owneremail = null;
        $this->ownerphone = null;
        $this->time = null;
        $this->mainimage = null;
        $this->thumb1 = null;
        $this->thumb2 = null;
        $this->thumb3 = null;
        $this->thumb4 = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ListingsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
