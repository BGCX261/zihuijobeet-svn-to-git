<?php

/**
 * job actions.
 *
 * @package    jobeet
 * @subpackage job
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class jobActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->jobeet_job_list = Doctrine::getTable('JobeetJob')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->job = $this->getRoute()->getObject();
    $this->forward404Unless($this->job);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new JobeetJobForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new JobeetJobForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($jobeet_job = Doctrine::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', array($request->getParameter('id'))));
    $this->form = new JobeetJobForm($jobeet_job);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($jobeet_job = Doctrine::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', array($request->getParameter('id'))));
    $this->form = new JobeetJobForm($jobeet_job);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($jobeet_job = Doctrine::getTable('JobeetJob')->find(array($request->getParameter('id'))), sprintf('Object jobeet_job does not exist (%s).', array($request->getParameter('id'))));
    $jobeet_job->delete();

    $this->redirect('job/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $jobeet_job = $form->save();

      $this->redirect('job/edit?id='.$jobeet_job['id']);
    }
  }
}
