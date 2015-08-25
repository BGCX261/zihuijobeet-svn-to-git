<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JobeetJob extends BaseJobeetJob
{
	public function getCompanySlug()
	{
	  return Jobeet::slugify($this->getCompany());
	}
	 
	public function getPositionSlug()
	{
	  return Jobeet::slugify($this->getPosition());
	}
	 
	public function getLocationSlug()
	{
	  return Jobeet::slugify($this->getLocation());
	}
	
	public function save(Doctrine_Connection $conn = null)
  	{
  		if ($this->isNew() && !$this->getExpiresAt())
	    {
	      $now = $this->getCreatedAt() ? strtotime($this->getCreatedAt()) : time();
	      $this->setExpiresAt(date('Y-m-d h:i:s', $now + 86400 * 30));
	    }
	 
	    return parent::save($conn);
  	}
	
}