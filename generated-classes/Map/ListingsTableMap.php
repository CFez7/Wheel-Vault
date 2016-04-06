<?php

namespace Map;

use \Listings;
use \ListingsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'listings' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ListingsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ListingsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'listings';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Listings';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Listings';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 23;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 23;

    /**
     * the column name for the id field
     */
    const COL_ID = 'listings.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'listings.title';

    /**
     * the column name for the frontwidth field
     */
    const COL_FRONTWIDTH = 'listings.frontwidth';

    /**
     * the column name for the rearwidth field
     */
    const COL_REARWIDTH = 'listings.rearwidth';

    /**
     * the column name for the size field
     */
    const COL_SIZE = 'listings.size';

    /**
     * the column name for the brand field
     */
    const COL_BRAND = 'listings.brand';

    /**
     * the column name for the studpattern1 field
     */
    const COL_STUDPATTERN1 = 'listings.studpattern1';

    /**
     * the column name for the studpattern2 field
     */
    const COL_STUDPATTERN2 = 'listings.studpattern2';

    /**
     * the column name for the frontoffset field
     */
    const COL_FRONTOFFSET = 'listings.frontoffset';

    /**
     * the column name for the rearoffset field
     */
    const COL_REAROFFSET = 'listings.rearoffset';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'listings.description';

    /**
     * the column name for the price field
     */
    const COL_PRICE = 'listings.price';

    /**
     * the column name for the swaps field
     */
    const COL_SWAPS = 'listings.swaps';

    /**
     * the column name for the ownerID field
     */
    const COL_OWNERID = 'listings.ownerID';

    /**
     * the column name for the ownerLocation field
     */
    const COL_OWNERLOCATION = 'listings.ownerLocation';

    /**
     * the column name for the ownerEmail field
     */
    const COL_OWNEREMAIL = 'listings.ownerEmail';

    /**
     * the column name for the ownerPhone field
     */
    const COL_OWNERPHONE = 'listings.ownerPhone';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'listings.time';

    /**
     * the column name for the mainImage field
     */
    const COL_MAINIMAGE = 'listings.mainImage';

    /**
     * the column name for the thumb1 field
     */
    const COL_THUMB1 = 'listings.thumb1';

    /**
     * the column name for the thumb2 field
     */
    const COL_THUMB2 = 'listings.thumb2';

    /**
     * the column name for the thumb3 field
     */
    const COL_THUMB3 = 'listings.thumb3';

    /**
     * the column name for the thumb4 field
     */
    const COL_THUMB4 = 'listings.thumb4';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Frontwidth', 'Rearwidth', 'Size', 'Brand', 'Studpattern1', 'Studpattern2', 'Frontoffset', 'Rearoffset', 'Description', 'Price', 'Swaps', 'Ownerid', 'Ownerlocation', 'Owneremail', 'Ownerphone', 'Time', 'Mainimage', 'Thumb1', 'Thumb2', 'Thumb3', 'Thumb4', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'frontwidth', 'rearwidth', 'size', 'brand', 'studpattern1', 'studpattern2', 'frontoffset', 'rearoffset', 'description', 'price', 'swaps', 'ownerid', 'ownerlocation', 'owneremail', 'ownerphone', 'time', 'mainimage', 'thumb1', 'thumb2', 'thumb3', 'thumb4', ),
        self::TYPE_COLNAME       => array(ListingsTableMap::COL_ID, ListingsTableMap::COL_TITLE, ListingsTableMap::COL_FRONTWIDTH, ListingsTableMap::COL_REARWIDTH, ListingsTableMap::COL_SIZE, ListingsTableMap::COL_BRAND, ListingsTableMap::COL_STUDPATTERN1, ListingsTableMap::COL_STUDPATTERN2, ListingsTableMap::COL_FRONTOFFSET, ListingsTableMap::COL_REAROFFSET, ListingsTableMap::COL_DESCRIPTION, ListingsTableMap::COL_PRICE, ListingsTableMap::COL_SWAPS, ListingsTableMap::COL_OWNERID, ListingsTableMap::COL_OWNERLOCATION, ListingsTableMap::COL_OWNEREMAIL, ListingsTableMap::COL_OWNERPHONE, ListingsTableMap::COL_TIME, ListingsTableMap::COL_MAINIMAGE, ListingsTableMap::COL_THUMB1, ListingsTableMap::COL_THUMB2, ListingsTableMap::COL_THUMB3, ListingsTableMap::COL_THUMB4, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'frontwidth', 'rearwidth', 'size', 'brand', 'studpattern1', 'studpattern2', 'frontoffset', 'rearoffset', 'description', 'price', 'swaps', 'ownerID', 'ownerLocation', 'ownerEmail', 'ownerPhone', 'time', 'mainImage', 'thumb1', 'thumb2', 'thumb3', 'thumb4', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Frontwidth' => 2, 'Rearwidth' => 3, 'Size' => 4, 'Brand' => 5, 'Studpattern1' => 6, 'Studpattern2' => 7, 'Frontoffset' => 8, 'Rearoffset' => 9, 'Description' => 10, 'Price' => 11, 'Swaps' => 12, 'Ownerid' => 13, 'Ownerlocation' => 14, 'Owneremail' => 15, 'Ownerphone' => 16, 'Time' => 17, 'Mainimage' => 18, 'Thumb1' => 19, 'Thumb2' => 20, 'Thumb3' => 21, 'Thumb4' => 22, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'frontwidth' => 2, 'rearwidth' => 3, 'size' => 4, 'brand' => 5, 'studpattern1' => 6, 'studpattern2' => 7, 'frontoffset' => 8, 'rearoffset' => 9, 'description' => 10, 'price' => 11, 'swaps' => 12, 'ownerid' => 13, 'ownerlocation' => 14, 'owneremail' => 15, 'ownerphone' => 16, 'time' => 17, 'mainimage' => 18, 'thumb1' => 19, 'thumb2' => 20, 'thumb3' => 21, 'thumb4' => 22, ),
        self::TYPE_COLNAME       => array(ListingsTableMap::COL_ID => 0, ListingsTableMap::COL_TITLE => 1, ListingsTableMap::COL_FRONTWIDTH => 2, ListingsTableMap::COL_REARWIDTH => 3, ListingsTableMap::COL_SIZE => 4, ListingsTableMap::COL_BRAND => 5, ListingsTableMap::COL_STUDPATTERN1 => 6, ListingsTableMap::COL_STUDPATTERN2 => 7, ListingsTableMap::COL_FRONTOFFSET => 8, ListingsTableMap::COL_REAROFFSET => 9, ListingsTableMap::COL_DESCRIPTION => 10, ListingsTableMap::COL_PRICE => 11, ListingsTableMap::COL_SWAPS => 12, ListingsTableMap::COL_OWNERID => 13, ListingsTableMap::COL_OWNERLOCATION => 14, ListingsTableMap::COL_OWNEREMAIL => 15, ListingsTableMap::COL_OWNERPHONE => 16, ListingsTableMap::COL_TIME => 17, ListingsTableMap::COL_MAINIMAGE => 18, ListingsTableMap::COL_THUMB1 => 19, ListingsTableMap::COL_THUMB2 => 20, ListingsTableMap::COL_THUMB3 => 21, ListingsTableMap::COL_THUMB4 => 22, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'frontwidth' => 2, 'rearwidth' => 3, 'size' => 4, 'brand' => 5, 'studpattern1' => 6, 'studpattern2' => 7, 'frontoffset' => 8, 'rearoffset' => 9, 'description' => 10, 'price' => 11, 'swaps' => 12, 'ownerID' => 13, 'ownerLocation' => 14, 'ownerEmail' => 15, 'ownerPhone' => 16, 'time' => 17, 'mainImage' => 18, 'thumb1' => 19, 'thumb2' => 20, 'thumb3' => 21, 'thumb4' => 22, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('listings');
        $this->setPhpName('Listings');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Listings');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 20, null);
        $this->addColumn('frontwidth', 'Frontwidth', 'INTEGER', true, 3, null);
        $this->addColumn('rearwidth', 'Rearwidth', 'INTEGER', true, 3, null);
        $this->addColumn('size', 'Size', 'INTEGER', true, 3, null);
        $this->addColumn('brand', 'Brand', 'VARCHAR', true, 15, null);
        $this->addColumn('studpattern1', 'Studpattern1', 'INTEGER', true, 5, null);
        $this->addColumn('studpattern2', 'Studpattern2', 'INTEGER', true, 5, null);
        $this->addColumn('frontoffset', 'Frontoffset', 'INTEGER', true, 3, null);
        $this->addColumn('rearoffset', 'Rearoffset', 'INTEGER', true, 3, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 150, null);
        $this->addColumn('price', 'Price', 'INTEGER', true, 5, null);
        $this->addColumn('swaps', 'Swaps', 'VARCHAR', true, 5, null);
        $this->addColumn('ownerID', 'Ownerid', 'INTEGER', true, null, null);
        $this->addColumn('ownerLocation', 'Ownerlocation', 'VARCHAR', true, 30, null);
        $this->addColumn('ownerEmail', 'Owneremail', 'VARCHAR', true, 50, null);
        $this->addColumn('ownerPhone', 'Ownerphone', 'VARCHAR', true, 11, null);
        $this->addColumn('time', 'Time', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('mainImage', 'Mainimage', 'VARCHAR', false, 25, 'default.png');
        $this->addColumn('thumb1', 'Thumb1', 'VARCHAR', false, 25, 'default.png');
        $this->addColumn('thumb2', 'Thumb2', 'VARCHAR', false, 25, 'default.png');
        $this->addColumn('thumb3', 'Thumb3', 'VARCHAR', false, 25, 'default.png');
        $this->addColumn('thumb4', 'Thumb4', 'VARCHAR', false, 25, 'default.png');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return null;
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return '';
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ListingsTableMap::CLASS_DEFAULT : ListingsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Listings object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ListingsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ListingsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ListingsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ListingsTableMap::OM_CLASS;
            /** @var Listings $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ListingsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ListingsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ListingsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Listings $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ListingsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ListingsTableMap::COL_ID);
            $criteria->addSelectColumn(ListingsTableMap::COL_TITLE);
            $criteria->addSelectColumn(ListingsTableMap::COL_FRONTWIDTH);
            $criteria->addSelectColumn(ListingsTableMap::COL_REARWIDTH);
            $criteria->addSelectColumn(ListingsTableMap::COL_SIZE);
            $criteria->addSelectColumn(ListingsTableMap::COL_BRAND);
            $criteria->addSelectColumn(ListingsTableMap::COL_STUDPATTERN1);
            $criteria->addSelectColumn(ListingsTableMap::COL_STUDPATTERN2);
            $criteria->addSelectColumn(ListingsTableMap::COL_FRONTOFFSET);
            $criteria->addSelectColumn(ListingsTableMap::COL_REAROFFSET);
            $criteria->addSelectColumn(ListingsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ListingsTableMap::COL_PRICE);
            $criteria->addSelectColumn(ListingsTableMap::COL_SWAPS);
            $criteria->addSelectColumn(ListingsTableMap::COL_OWNERID);
            $criteria->addSelectColumn(ListingsTableMap::COL_OWNERLOCATION);
            $criteria->addSelectColumn(ListingsTableMap::COL_OWNEREMAIL);
            $criteria->addSelectColumn(ListingsTableMap::COL_OWNERPHONE);
            $criteria->addSelectColumn(ListingsTableMap::COL_TIME);
            $criteria->addSelectColumn(ListingsTableMap::COL_MAINIMAGE);
            $criteria->addSelectColumn(ListingsTableMap::COL_THUMB1);
            $criteria->addSelectColumn(ListingsTableMap::COL_THUMB2);
            $criteria->addSelectColumn(ListingsTableMap::COL_THUMB3);
            $criteria->addSelectColumn(ListingsTableMap::COL_THUMB4);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.frontwidth');
            $criteria->addSelectColumn($alias . '.rearwidth');
            $criteria->addSelectColumn($alias . '.size');
            $criteria->addSelectColumn($alias . '.brand');
            $criteria->addSelectColumn($alias . '.studpattern1');
            $criteria->addSelectColumn($alias . '.studpattern2');
            $criteria->addSelectColumn($alias . '.frontoffset');
            $criteria->addSelectColumn($alias . '.rearoffset');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.swaps');
            $criteria->addSelectColumn($alias . '.ownerID');
            $criteria->addSelectColumn($alias . '.ownerLocation');
            $criteria->addSelectColumn($alias . '.ownerEmail');
            $criteria->addSelectColumn($alias . '.ownerPhone');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.mainImage');
            $criteria->addSelectColumn($alias . '.thumb1');
            $criteria->addSelectColumn($alias . '.thumb2');
            $criteria->addSelectColumn($alias . '.thumb3');
            $criteria->addSelectColumn($alias . '.thumb4');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ListingsTableMap::DATABASE_NAME)->getTable(ListingsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ListingsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ListingsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ListingsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Listings or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Listings object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Listings) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Listings object has no primary key');
        }

        $query = ListingsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ListingsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ListingsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the listings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ListingsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Listings or Criteria object.
     *
     * @param mixed               $criteria Criteria or Listings object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Listings object
        }


        // Set the correct dbName
        $query = ListingsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ListingsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ListingsTableMap::buildTableMap();
