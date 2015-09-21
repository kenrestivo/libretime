<?php


/**
 * Base class that represents a query for the 'podcast' table.
 *
 *
 *
 * @method PodcastQuery orderByDbId($order = Criteria::ASC) Order by the id column
 * @method PodcastQuery orderByDbUrl($order = Criteria::ASC) Order by the url column
 * @method PodcastQuery orderByDbTitle($order = Criteria::ASC) Order by the title column
 * @method PodcastQuery orderByDbCreator($order = Criteria::ASC) Order by the creator column
 * @method PodcastQuery orderByDbDescription($order = Criteria::ASC) Order by the description column
 * @method PodcastQuery orderByDbAutoIngest($order = Criteria::ASC) Order by the auto_ingest column
 * @method PodcastQuery orderByDbOwner($order = Criteria::ASC) Order by the owner column
 * @method PodcastQuery orderByDbType($order = Criteria::ASC) Order by the type column
 *
 * @method PodcastQuery groupByDbId() Group by the id column
 * @method PodcastQuery groupByDbUrl() Group by the url column
 * @method PodcastQuery groupByDbTitle() Group by the title column
 * @method PodcastQuery groupByDbCreator() Group by the creator column
 * @method PodcastQuery groupByDbDescription() Group by the description column
 * @method PodcastQuery groupByDbAutoIngest() Group by the auto_ingest column
 * @method PodcastQuery groupByDbOwner() Group by the owner column
 * @method PodcastQuery groupByDbType() Group by the type column
 *
 * @method PodcastQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PodcastQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PodcastQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PodcastQuery leftJoinCcSubjs($relationAlias = null) Adds a LEFT JOIN clause to the query using the CcSubjs relation
 * @method PodcastQuery rightJoinCcSubjs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CcSubjs relation
 * @method PodcastQuery innerJoinCcSubjs($relationAlias = null) Adds a INNER JOIN clause to the query using the CcSubjs relation
 *
 * @method PodcastQuery leftJoinPodcastEpisodes($relationAlias = null) Adds a LEFT JOIN clause to the query using the PodcastEpisodes relation
 * @method PodcastQuery rightJoinPodcastEpisodes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PodcastEpisodes relation
 * @method PodcastQuery innerJoinPodcastEpisodes($relationAlias = null) Adds a INNER JOIN clause to the query using the PodcastEpisodes relation
 *
 * @method Podcast findOne(PropelPDO $con = null) Return the first Podcast matching the query
 * @method Podcast findOneOrCreate(PropelPDO $con = null) Return the first Podcast matching the query, or a new Podcast object populated from the query conditions when no match is found
 *
 * @method Podcast findOneByDbUrl(string $url) Return the first Podcast filtered by the url column
 * @method Podcast findOneByDbTitle(string $title) Return the first Podcast filtered by the title column
 * @method Podcast findOneByDbCreator(string $creator) Return the first Podcast filtered by the creator column
 * @method Podcast findOneByDbDescription(string $description) Return the first Podcast filtered by the description column
 * @method Podcast findOneByDbAutoIngest(boolean $auto_ingest) Return the first Podcast filtered by the auto_ingest column
 * @method Podcast findOneByDbOwner(int $owner) Return the first Podcast filtered by the owner column
 * @method Podcast findOneByDbType(int $type) Return the first Podcast filtered by the type column
 *
 * @method array findByDbId(int $id) Return Podcast objects filtered by the id column
 * @method array findByDbUrl(string $url) Return Podcast objects filtered by the url column
 * @method array findByDbTitle(string $title) Return Podcast objects filtered by the title column
 * @method array findByDbCreator(string $creator) Return Podcast objects filtered by the creator column
 * @method array findByDbDescription(string $description) Return Podcast objects filtered by the description column
 * @method array findByDbAutoIngest(boolean $auto_ingest) Return Podcast objects filtered by the auto_ingest column
 * @method array findByDbOwner(int $owner) Return Podcast objects filtered by the owner column
 * @method array findByDbType(int $type) Return Podcast objects filtered by the type column
 *
 * @package    propel.generator.airtime.om
 */
abstract class BasePodcastQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePodcastQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'airtime';
        }
        if (null === $modelName) {
            $modelName = 'Podcast';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PodcastQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PodcastQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PodcastQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PodcastQuery) {
            return $criteria;
        }
        $query = new PodcastQuery(null, null, $modelAlias);

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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Podcast|Podcast[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PodcastPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PodcastPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Podcast A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDbId($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Podcast A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id", "url", "title", "creator", "description", "auto_ingest", "owner", "type" FROM "podcast" WHERE "id" = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Podcast();
            $obj->hydrate($row);
            PodcastPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Podcast|Podcast[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Podcast[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PodcastPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PodcastPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByDbId(1234); // WHERE id = 1234
     * $query->filterByDbId(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByDbId(array('min' => 12)); // WHERE id >= 12
     * $query->filterByDbId(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $dbId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbId($dbId = null, $comparison = null)
    {
        if (is_array($dbId)) {
            $useMinMax = false;
            if (isset($dbId['min'])) {
                $this->addUsingAlias(PodcastPeer::ID, $dbId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dbId['max'])) {
                $this->addUsingAlias(PodcastPeer::ID, $dbId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PodcastPeer::ID, $dbId, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByDbUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByDbUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dbUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbUrl($dbUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dbUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dbUrl)) {
                $dbUrl = str_replace('*', '%', $dbUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PodcastPeer::URL, $dbUrl, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByDbTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByDbTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dbTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbTitle($dbTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dbTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dbTitle)) {
                $dbTitle = str_replace('*', '%', $dbTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PodcastPeer::TITLE, $dbTitle, $comparison);
    }

    /**
     * Filter the query on the creator column
     *
     * Example usage:
     * <code>
     * $query->filterByDbCreator('fooValue');   // WHERE creator = 'fooValue'
     * $query->filterByDbCreator('%fooValue%'); // WHERE creator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dbCreator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbCreator($dbCreator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dbCreator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dbCreator)) {
                $dbCreator = str_replace('*', '%', $dbCreator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PodcastPeer::CREATOR, $dbCreator, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDbDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDbDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dbDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbDescription($dbDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dbDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dbDescription)) {
                $dbDescription = str_replace('*', '%', $dbDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PodcastPeer::DESCRIPTION, $dbDescription, $comparison);
    }

    /**
     * Filter the query on the auto_ingest column
     *
     * Example usage:
     * <code>
     * $query->filterByDbAutoIngest(true); // WHERE auto_ingest = true
     * $query->filterByDbAutoIngest('yes'); // WHERE auto_ingest = true
     * </code>
     *
     * @param     boolean|string $dbAutoIngest The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbAutoIngest($dbAutoIngest = null, $comparison = null)
    {
        if (is_string($dbAutoIngest)) {
            $dbAutoIngest = in_array(strtolower($dbAutoIngest), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PodcastPeer::AUTO_INGEST, $dbAutoIngest, $comparison);
    }

    /**
     * Filter the query on the owner column
     *
     * Example usage:
     * <code>
     * $query->filterByDbOwner(1234); // WHERE owner = 1234
     * $query->filterByDbOwner(array(12, 34)); // WHERE owner IN (12, 34)
     * $query->filterByDbOwner(array('min' => 12)); // WHERE owner >= 12
     * $query->filterByDbOwner(array('max' => 12)); // WHERE owner <= 12
     * </code>
     *
     * @see       filterByCcSubjs()
     *
     * @param     mixed $dbOwner The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbOwner($dbOwner = null, $comparison = null)
    {
        if (is_array($dbOwner)) {
            $useMinMax = false;
            if (isset($dbOwner['min'])) {
                $this->addUsingAlias(PodcastPeer::OWNER, $dbOwner['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dbOwner['max'])) {
                $this->addUsingAlias(PodcastPeer::OWNER, $dbOwner['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PodcastPeer::OWNER, $dbOwner, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByDbType(1234); // WHERE type = 1234
     * $query->filterByDbType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByDbType(array('min' => 12)); // WHERE type >= 12
     * $query->filterByDbType(array('max' => 12)); // WHERE type <= 12
     * </code>
     *
     * @param     mixed $dbType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function filterByDbType($dbType = null, $comparison = null)
    {
        if (is_array($dbType)) {
            $useMinMax = false;
            if (isset($dbType['min'])) {
                $this->addUsingAlias(PodcastPeer::TYPE, $dbType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dbType['max'])) {
                $this->addUsingAlias(PodcastPeer::TYPE, $dbType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PodcastPeer::TYPE, $dbType, $comparison);
    }

    /**
     * Filter the query by a related CcSubjs object
     *
     * @param   CcSubjs|PropelObjectCollection $ccSubjs The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PodcastQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCcSubjs($ccSubjs, $comparison = null)
    {
        if ($ccSubjs instanceof CcSubjs) {
            return $this
                ->addUsingAlias(PodcastPeer::OWNER, $ccSubjs->getDbId(), $comparison);
        } elseif ($ccSubjs instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PodcastPeer::OWNER, $ccSubjs->toKeyValue('PrimaryKey', 'DbId'), $comparison);
        } else {
            throw new PropelException('filterByCcSubjs() only accepts arguments of type CcSubjs or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CcSubjs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function joinCcSubjs($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CcSubjs');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CcSubjs');
        }

        return $this;
    }

    /**
     * Use the CcSubjs relation CcSubjs object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CcSubjsQuery A secondary query class using the current class as primary query
     */
    public function useCcSubjsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCcSubjs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CcSubjs', 'CcSubjsQuery');
    }

    /**
     * Filter the query by a related PodcastEpisodes object
     *
     * @param   PodcastEpisodes|PropelObjectCollection $podcastEpisodes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PodcastQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPodcastEpisodes($podcastEpisodes, $comparison = null)
    {
        if ($podcastEpisodes instanceof PodcastEpisodes) {
            return $this
                ->addUsingAlias(PodcastPeer::ID, $podcastEpisodes->getDbPodcastId(), $comparison);
        } elseif ($podcastEpisodes instanceof PropelObjectCollection) {
            return $this
                ->usePodcastEpisodesQuery()
                ->filterByPrimaryKeys($podcastEpisodes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPodcastEpisodes() only accepts arguments of type PodcastEpisodes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PodcastEpisodes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function joinPodcastEpisodes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PodcastEpisodes');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PodcastEpisodes');
        }

        return $this;
    }

    /**
     * Use the PodcastEpisodes relation PodcastEpisodes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PodcastEpisodesQuery A secondary query class using the current class as primary query
     */
    public function usePodcastEpisodesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPodcastEpisodes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PodcastEpisodes', 'PodcastEpisodesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Podcast $podcast Object to remove from the list of results
     *
     * @return PodcastQuery The current query, for fluid interface
     */
    public function prune($podcast = null)
    {
        if ($podcast) {
            $this->addUsingAlias(PodcastPeer::ID, $podcast->getDbId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}