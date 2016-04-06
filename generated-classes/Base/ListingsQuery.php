<?php

namespace Base;

use \Listings as ChildListings;
use \ListingsQuery as ChildListingsQuery;
use \Exception;
use Map\ListingsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'listings' table.
 *
 *
 *
 * @method     ChildListingsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildListingsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildListingsQuery orderByFrontwidth($order = Criteria::ASC) Order by the frontwidth column
 * @method     ChildListingsQuery orderByRearwidth($order = Criteria::ASC) Order by the rearwidth column
 * @method     ChildListingsQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ChildListingsQuery orderByBrand($order = Criteria::ASC) Order by the brand column
 * @method     ChildListingsQuery orderByStudpattern1($order = Criteria::ASC) Order by the studpattern1 column
 * @method     ChildListingsQuery orderByStudpattern2($order = Criteria::ASC) Order by the studpattern2 column
 * @method     ChildListingsQuery orderByFrontoffset($order = Criteria::ASC) Order by the frontoffset column
 * @method     ChildListingsQuery orderByRearoffset($order = Criteria::ASC) Order by the rearoffset column
 * @method     ChildListingsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildListingsQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildListingsQuery orderBySwaps($order = Criteria::ASC) Order by the swaps column
 * @method     ChildListingsQuery orderByOwnerid($order = Criteria::ASC) Order by the ownerID column
 * @method     ChildListingsQuery orderByOwnerlocation($order = Criteria::ASC) Order by the ownerLocation column
 * @method     ChildListingsQuery orderByOwneremail($order = Criteria::ASC) Order by the ownerEmail column
 * @method     ChildListingsQuery orderByOwnerphone($order = Criteria::ASC) Order by the ownerPhone column
 * @method     ChildListingsQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildListingsQuery orderByMainimage($order = Criteria::ASC) Order by the mainImage column
 * @method     ChildListingsQuery orderByThumb1($order = Criteria::ASC) Order by the thumb1 column
 * @method     ChildListingsQuery orderByThumb2($order = Criteria::ASC) Order by the thumb2 column
 * @method     ChildListingsQuery orderByThumb3($order = Criteria::ASC) Order by the thumb3 column
 * @method     ChildListingsQuery orderByThumb4($order = Criteria::ASC) Order by the thumb4 column
 *
 * @method     ChildListingsQuery groupById() Group by the id column
 * @method     ChildListingsQuery groupByTitle() Group by the title column
 * @method     ChildListingsQuery groupByFrontwidth() Group by the frontwidth column
 * @method     ChildListingsQuery groupByRearwidth() Group by the rearwidth column
 * @method     ChildListingsQuery groupBySize() Group by the size column
 * @method     ChildListingsQuery groupByBrand() Group by the brand column
 * @method     ChildListingsQuery groupByStudpattern1() Group by the studpattern1 column
 * @method     ChildListingsQuery groupByStudpattern2() Group by the studpattern2 column
 * @method     ChildListingsQuery groupByFrontoffset() Group by the frontoffset column
 * @method     ChildListingsQuery groupByRearoffset() Group by the rearoffset column
 * @method     ChildListingsQuery groupByDescription() Group by the description column
 * @method     ChildListingsQuery groupByPrice() Group by the price column
 * @method     ChildListingsQuery groupBySwaps() Group by the swaps column
 * @method     ChildListingsQuery groupByOwnerid() Group by the ownerID column
 * @method     ChildListingsQuery groupByOwnerlocation() Group by the ownerLocation column
 * @method     ChildListingsQuery groupByOwneremail() Group by the ownerEmail column
 * @method     ChildListingsQuery groupByOwnerphone() Group by the ownerPhone column
 * @method     ChildListingsQuery groupByTime() Group by the time column
 * @method     ChildListingsQuery groupByMainimage() Group by the mainImage column
 * @method     ChildListingsQuery groupByThumb1() Group by the thumb1 column
 * @method     ChildListingsQuery groupByThumb2() Group by the thumb2 column
 * @method     ChildListingsQuery groupByThumb3() Group by the thumb3 column
 * @method     ChildListingsQuery groupByThumb4() Group by the thumb4 column
 *
 * @method     ChildListingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildListingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildListingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildListingsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildListingsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildListingsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildListings findOne(ConnectionInterface $con = null) Return the first ChildListings matching the query
 * @method     ChildListings findOneOrCreate(ConnectionInterface $con = null) Return the first ChildListings matching the query, or a new ChildListings object populated from the query conditions when no match is found
 *
 * @method     ChildListings findOneById(int $id) Return the first ChildListings filtered by the id column
 * @method     ChildListings findOneByTitle(string $title) Return the first ChildListings filtered by the title column
 * @method     ChildListings findOneByFrontwidth(int $frontwidth) Return the first ChildListings filtered by the frontwidth column
 * @method     ChildListings findOneByRearwidth(int $rearwidth) Return the first ChildListings filtered by the rearwidth column
 * @method     ChildListings findOneBySize(int $size) Return the first ChildListings filtered by the size column
 * @method     ChildListings findOneByBrand(string $brand) Return the first ChildListings filtered by the brand column
 * @method     ChildListings findOneByStudpattern1(int $studpattern1) Return the first ChildListings filtered by the studpattern1 column
 * @method     ChildListings findOneByStudpattern2(int $studpattern2) Return the first ChildListings filtered by the studpattern2 column
 * @method     ChildListings findOneByFrontoffset(int $frontoffset) Return the first ChildListings filtered by the frontoffset column
 * @method     ChildListings findOneByRearoffset(int $rearoffset) Return the first ChildListings filtered by the rearoffset column
 * @method     ChildListings findOneByDescription(string $description) Return the first ChildListings filtered by the description column
 * @method     ChildListings findOneByPrice(int $price) Return the first ChildListings filtered by the price column
 * @method     ChildListings findOneBySwaps(string $swaps) Return the first ChildListings filtered by the swaps column
 * @method     ChildListings findOneByOwnerid(int $ownerID) Return the first ChildListings filtered by the ownerID column
 * @method     ChildListings findOneByOwnerlocation(string $ownerLocation) Return the first ChildListings filtered by the ownerLocation column
 * @method     ChildListings findOneByOwneremail(string $ownerEmail) Return the first ChildListings filtered by the ownerEmail column
 * @method     ChildListings findOneByOwnerphone(string $ownerPhone) Return the first ChildListings filtered by the ownerPhone column
 * @method     ChildListings findOneByTime(string $time) Return the first ChildListings filtered by the time column
 * @method     ChildListings findOneByMainimage(string $mainImage) Return the first ChildListings filtered by the mainImage column
 * @method     ChildListings findOneByThumb1(string $thumb1) Return the first ChildListings filtered by the thumb1 column
 * @method     ChildListings findOneByThumb2(string $thumb2) Return the first ChildListings filtered by the thumb2 column
 * @method     ChildListings findOneByThumb3(string $thumb3) Return the first ChildListings filtered by the thumb3 column
 * @method     ChildListings findOneByThumb4(string $thumb4) Return the first ChildListings filtered by the thumb4 column *

 * @method     ChildListings requirePk($key, ConnectionInterface $con = null) Return the ChildListings by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOne(ConnectionInterface $con = null) Return the first ChildListings matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildListings requireOneById(int $id) Return the first ChildListings filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByTitle(string $title) Return the first ChildListings filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByFrontwidth(int $frontwidth) Return the first ChildListings filtered by the frontwidth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByRearwidth(int $rearwidth) Return the first ChildListings filtered by the rearwidth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneBySize(int $size) Return the first ChildListings filtered by the size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByBrand(string $brand) Return the first ChildListings filtered by the brand column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByStudpattern1(int $studpattern1) Return the first ChildListings filtered by the studpattern1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByStudpattern2(int $studpattern2) Return the first ChildListings filtered by the studpattern2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByFrontoffset(int $frontoffset) Return the first ChildListings filtered by the frontoffset column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByRearoffset(int $rearoffset) Return the first ChildListings filtered by the rearoffset column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByDescription(string $description) Return the first ChildListings filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByPrice(int $price) Return the first ChildListings filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneBySwaps(string $swaps) Return the first ChildListings filtered by the swaps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByOwnerid(int $ownerID) Return the first ChildListings filtered by the ownerID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByOwnerlocation(string $ownerLocation) Return the first ChildListings filtered by the ownerLocation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByOwneremail(string $ownerEmail) Return the first ChildListings filtered by the ownerEmail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByOwnerphone(string $ownerPhone) Return the first ChildListings filtered by the ownerPhone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByTime(string $time) Return the first ChildListings filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByMainimage(string $mainImage) Return the first ChildListings filtered by the mainImage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByThumb1(string $thumb1) Return the first ChildListings filtered by the thumb1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByThumb2(string $thumb2) Return the first ChildListings filtered by the thumb2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByThumb3(string $thumb3) Return the first ChildListings filtered by the thumb3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildListings requireOneByThumb4(string $thumb4) Return the first ChildListings filtered by the thumb4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildListings[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildListings objects based on current ModelCriteria
 * @method     ChildListings[]|ObjectCollection findById(int $id) Return ChildListings objects filtered by the id column
 * @method     ChildListings[]|ObjectCollection findByTitle(string $title) Return ChildListings objects filtered by the title column
 * @method     ChildListings[]|ObjectCollection findByFrontwidth(int $frontwidth) Return ChildListings objects filtered by the frontwidth column
 * @method     ChildListings[]|ObjectCollection findByRearwidth(int $rearwidth) Return ChildListings objects filtered by the rearwidth column
 * @method     ChildListings[]|ObjectCollection findBySize(int $size) Return ChildListings objects filtered by the size column
 * @method     ChildListings[]|ObjectCollection findByBrand(string $brand) Return ChildListings objects filtered by the brand column
 * @method     ChildListings[]|ObjectCollection findByStudpattern1(int $studpattern1) Return ChildListings objects filtered by the studpattern1 column
 * @method     ChildListings[]|ObjectCollection findByStudpattern2(int $studpattern2) Return ChildListings objects filtered by the studpattern2 column
 * @method     ChildListings[]|ObjectCollection findByFrontoffset(int $frontoffset) Return ChildListings objects filtered by the frontoffset column
 * @method     ChildListings[]|ObjectCollection findByRearoffset(int $rearoffset) Return ChildListings objects filtered by the rearoffset column
 * @method     ChildListings[]|ObjectCollection findByDescription(string $description) Return ChildListings objects filtered by the description column
 * @method     ChildListings[]|ObjectCollection findByPrice(int $price) Return ChildListings objects filtered by the price column
 * @method     ChildListings[]|ObjectCollection findBySwaps(string $swaps) Return ChildListings objects filtered by the swaps column
 * @method     ChildListings[]|ObjectCollection findByOwnerid(int $ownerID) Return ChildListings objects filtered by the ownerID column
 * @method     ChildListings[]|ObjectCollection findByOwnerlocation(string $ownerLocation) Return ChildListings objects filtered by the ownerLocation column
 * @method     ChildListings[]|ObjectCollection findByOwneremail(string $ownerEmail) Return ChildListings objects filtered by the ownerEmail column
 * @method     ChildListings[]|ObjectCollection findByOwnerphone(string $ownerPhone) Return ChildListings objects filtered by the ownerPhone column
 * @method     ChildListings[]|ObjectCollection findByTime(string $time) Return ChildListings objects filtered by the time column
 * @method     ChildListings[]|ObjectCollection findByMainimage(string $mainImage) Return ChildListings objects filtered by the mainImage column
 * @method     ChildListings[]|ObjectCollection findByThumb1(string $thumb1) Return ChildListings objects filtered by the thumb1 column
 * @method     ChildListings[]|ObjectCollection findByThumb2(string $thumb2) Return ChildListings objects filtered by the thumb2 column
 * @method     ChildListings[]|ObjectCollection findByThumb3(string $thumb3) Return ChildListings objects filtered by the thumb3 column
 * @method     ChildListings[]|ObjectCollection findByThumb4(string $thumb4) Return ChildListings objects filtered by the thumb4 column
 * @method     ChildListings[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ListingsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ListingsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Listings', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildListingsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildListingsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildListingsQuery) {
            return $criteria;
        }
        $query = new ChildListingsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildListings|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Listings object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Listings object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Listings object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Listings object has no primary key');
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the frontwidth column
     *
     * Example usage:
     * <code>
     * $query->filterByFrontwidth(1234); // WHERE frontwidth = 1234
     * $query->filterByFrontwidth(array(12, 34)); // WHERE frontwidth IN (12, 34)
     * $query->filterByFrontwidth(array('min' => 12)); // WHERE frontwidth > 12
     * </code>
     *
     * @param     mixed $frontwidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByFrontwidth($frontwidth = null, $comparison = null)
    {
        if (is_array($frontwidth)) {
            $useMinMax = false;
            if (isset($frontwidth['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_FRONTWIDTH, $frontwidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($frontwidth['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_FRONTWIDTH, $frontwidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_FRONTWIDTH, $frontwidth, $comparison);
    }

    /**
     * Filter the query on the rearwidth column
     *
     * Example usage:
     * <code>
     * $query->filterByRearwidth(1234); // WHERE rearwidth = 1234
     * $query->filterByRearwidth(array(12, 34)); // WHERE rearwidth IN (12, 34)
     * $query->filterByRearwidth(array('min' => 12)); // WHERE rearwidth > 12
     * </code>
     *
     * @param     mixed $rearwidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByRearwidth($rearwidth = null, $comparison = null)
    {
        if (is_array($rearwidth)) {
            $useMinMax = false;
            if (isset($rearwidth['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_REARWIDTH, $rearwidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rearwidth['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_REARWIDTH, $rearwidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_REARWIDTH, $rearwidth, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size > 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the brand column
     *
     * Example usage:
     * <code>
     * $query->filterByBrand('fooValue');   // WHERE brand = 'fooValue'
     * $query->filterByBrand('%fooValue%'); // WHERE brand LIKE '%fooValue%'
     * </code>
     *
     * @param     string $brand The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByBrand($brand = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($brand)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $brand)) {
                $brand = str_replace('*', '%', $brand);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_BRAND, $brand, $comparison);
    }

    /**
     * Filter the query on the studpattern1 column
     *
     * Example usage:
     * <code>
     * $query->filterByStudpattern1(1234); // WHERE studpattern1 = 1234
     * $query->filterByStudpattern1(array(12, 34)); // WHERE studpattern1 IN (12, 34)
     * $query->filterByStudpattern1(array('min' => 12)); // WHERE studpattern1 > 12
     * </code>
     *
     * @param     mixed $studpattern1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByStudpattern1($studpattern1 = null, $comparison = null)
    {
        if (is_array($studpattern1)) {
            $useMinMax = false;
            if (isset($studpattern1['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN1, $studpattern1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($studpattern1['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN1, $studpattern1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN1, $studpattern1, $comparison);
    }

    /**
     * Filter the query on the studpattern2 column
     *
     * Example usage:
     * <code>
     * $query->filterByStudpattern2(1234); // WHERE studpattern2 = 1234
     * $query->filterByStudpattern2(array(12, 34)); // WHERE studpattern2 IN (12, 34)
     * $query->filterByStudpattern2(array('min' => 12)); // WHERE studpattern2 > 12
     * </code>
     *
     * @param     mixed $studpattern2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByStudpattern2($studpattern2 = null, $comparison = null)
    {
        if (is_array($studpattern2)) {
            $useMinMax = false;
            if (isset($studpattern2['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN2, $studpattern2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($studpattern2['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN2, $studpattern2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_STUDPATTERN2, $studpattern2, $comparison);
    }

    /**
     * Filter the query on the frontoffset column
     *
     * Example usage:
     * <code>
     * $query->filterByFrontoffset(1234); // WHERE frontoffset = 1234
     * $query->filterByFrontoffset(array(12, 34)); // WHERE frontoffset IN (12, 34)
     * $query->filterByFrontoffset(array('min' => 12)); // WHERE frontoffset > 12
     * </code>
     *
     * @param     mixed $frontoffset The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByFrontoffset($frontoffset = null, $comparison = null)
    {
        if (is_array($frontoffset)) {
            $useMinMax = false;
            if (isset($frontoffset['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_FRONTOFFSET, $frontoffset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($frontoffset['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_FRONTOFFSET, $frontoffset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_FRONTOFFSET, $frontoffset, $comparison);
    }

    /**
     * Filter the query on the rearoffset column
     *
     * Example usage:
     * <code>
     * $query->filterByRearoffset(1234); // WHERE rearoffset = 1234
     * $query->filterByRearoffset(array(12, 34)); // WHERE rearoffset IN (12, 34)
     * $query->filterByRearoffset(array('min' => 12)); // WHERE rearoffset > 12
     * </code>
     *
     * @param     mixed $rearoffset The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByRearoffset($rearoffset = null, $comparison = null)
    {
        if (is_array($rearoffset)) {
            $useMinMax = false;
            if (isset($rearoffset['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_REAROFFSET, $rearoffset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rearoffset['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_REAROFFSET, $rearoffset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_REAROFFSET, $rearoffset, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the swaps column
     *
     * Example usage:
     * <code>
     * $query->filterBySwaps('fooValue');   // WHERE swaps = 'fooValue'
     * $query->filterBySwaps('%fooValue%'); // WHERE swaps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $swaps The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterBySwaps($swaps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($swaps)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $swaps)) {
                $swaps = str_replace('*', '%', $swaps);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_SWAPS, $swaps, $comparison);
    }

    /**
     * Filter the query on the ownerID column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnerid(1234); // WHERE ownerID = 1234
     * $query->filterByOwnerid(array(12, 34)); // WHERE ownerID IN (12, 34)
     * $query->filterByOwnerid(array('min' => 12)); // WHERE ownerID > 12
     * </code>
     *
     * @param     mixed $ownerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByOwnerid($ownerid = null, $comparison = null)
    {
        if (is_array($ownerid)) {
            $useMinMax = false;
            if (isset($ownerid['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_OWNERID, $ownerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ownerid['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_OWNERID, $ownerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_OWNERID, $ownerid, $comparison);
    }

    /**
     * Filter the query on the ownerLocation column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnerlocation('fooValue');   // WHERE ownerLocation = 'fooValue'
     * $query->filterByOwnerlocation('%fooValue%'); // WHERE ownerLocation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ownerlocation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByOwnerlocation($ownerlocation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ownerlocation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ownerlocation)) {
                $ownerlocation = str_replace('*', '%', $ownerlocation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_OWNERLOCATION, $ownerlocation, $comparison);
    }

    /**
     * Filter the query on the ownerEmail column
     *
     * Example usage:
     * <code>
     * $query->filterByOwneremail('fooValue');   // WHERE ownerEmail = 'fooValue'
     * $query->filterByOwneremail('%fooValue%'); // WHERE ownerEmail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $owneremail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByOwneremail($owneremail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($owneremail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $owneremail)) {
                $owneremail = str_replace('*', '%', $owneremail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_OWNEREMAIL, $owneremail, $comparison);
    }

    /**
     * Filter the query on the ownerPhone column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnerphone('fooValue');   // WHERE ownerPhone = 'fooValue'
     * $query->filterByOwnerphone('%fooValue%'); // WHERE ownerPhone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ownerphone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByOwnerphone($ownerphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ownerphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ownerphone)) {
                $ownerphone = str_replace('*', '%', $ownerphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_OWNERPHONE, $ownerphone, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('2011-03-14'); // WHERE time = '2011-03-14'
     * $query->filterByTime('now'); // WHERE time = '2011-03-14'
     * $query->filterByTime(array('max' => 'yesterday')); // WHERE time > '2011-03-13'
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ListingsTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ListingsTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the mainImage column
     *
     * Example usage:
     * <code>
     * $query->filterByMainimage('fooValue');   // WHERE mainImage = 'fooValue'
     * $query->filterByMainimage('%fooValue%'); // WHERE mainImage LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mainimage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByMainimage($mainimage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mainimage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mainimage)) {
                $mainimage = str_replace('*', '%', $mainimage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_MAINIMAGE, $mainimage, $comparison);
    }

    /**
     * Filter the query on the thumb1 column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb1('fooValue');   // WHERE thumb1 = 'fooValue'
     * $query->filterByThumb1('%fooValue%'); // WHERE thumb1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumb1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByThumb1($thumb1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $thumb1)) {
                $thumb1 = str_replace('*', '%', $thumb1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_THUMB1, $thumb1, $comparison);
    }

    /**
     * Filter the query on the thumb2 column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb2('fooValue');   // WHERE thumb2 = 'fooValue'
     * $query->filterByThumb2('%fooValue%'); // WHERE thumb2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumb2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByThumb2($thumb2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $thumb2)) {
                $thumb2 = str_replace('*', '%', $thumb2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_THUMB2, $thumb2, $comparison);
    }

    /**
     * Filter the query on the thumb3 column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb3('fooValue');   // WHERE thumb3 = 'fooValue'
     * $query->filterByThumb3('%fooValue%'); // WHERE thumb3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumb3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByThumb3($thumb3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $thumb3)) {
                $thumb3 = str_replace('*', '%', $thumb3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_THUMB3, $thumb3, $comparison);
    }

    /**
     * Filter the query on the thumb4 column
     *
     * Example usage:
     * <code>
     * $query->filterByThumb4('fooValue');   // WHERE thumb4 = 'fooValue'
     * $query->filterByThumb4('%fooValue%'); // WHERE thumb4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumb4 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function filterByThumb4($thumb4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumb4)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $thumb4)) {
                $thumb4 = str_replace('*', '%', $thumb4);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ListingsTableMap::COL_THUMB4, $thumb4, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildListings $listings Object to remove from the list of results
     *
     * @return $this|ChildListingsQuery The current query, for fluid interface
     */
    public function prune($listings = null)
    {
        if ($listings) {
            throw new LogicException('Listings object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the listings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ListingsTableMap::clearInstancePool();
            ListingsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ListingsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ListingsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ListingsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ListingsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ListingsQuery
