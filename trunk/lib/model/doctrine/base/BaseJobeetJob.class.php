<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseJobeetJob extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('jobeet_job');
    $this->hasColumn('category_id', 'integer', null, array('type' => 'integer', 'notnull' => true));
    $this->hasColumn('type', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('company', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    $this->hasColumn('logo', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('url', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('position', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    $this->hasColumn('location', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    $this->hasColumn('description', 'string', 4000, array('type' => 'string', 'notnull' => true, 'length' => '4000'));
    $this->hasColumn('how_to_apply', 'string', 4000, array('type' => 'string', 'notnull' => true, 'length' => '4000'));
    $this->hasColumn('token', 'string', 255, array('type' => 'string', 'notnull' => true, 'unique' => true, 'length' => '255'));
    $this->hasColumn('is_public', 'boolean', null, array('type' => 'boolean', 'notnull' => true, 'default' => '1'));
    $this->hasColumn('is_activated', 'boolean', null, array('type' => 'boolean', 'notnull' => true, 'default' => 0));
    $this->hasColumn('email', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    $this->hasColumn('expires_at', 'timestamp', null, array('type' => 'timestamp', 'notnull' => true));
  }

  public function setUp()
  {
    $this->hasOne('JobeetCategory', array('local' => 'category_id',
                                          'foreign' => 'id'));

    $timestampable0 = new Doctrine_Template_Timestampable();
    $this->actAs($timestampable0);
  }
}