<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form builder for Contact Us form
 *
 *   This file is part of the Data Catalog project.
 *   Copyright (C) 2016 NYU Health Sciences Library
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
class ContactFormEmailType extends AbstractType {

  private $affiliationOptions;

  /**
   * Build the form
   *
   * @param FormBuilderInterface
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('first_name', 'text', array(
      'label'=> 'First Name',
      'label_attr'=>array,
    ));
     $builder->add('last_name', 'text', array(
      'label'=> 'Last Name',
      'label_attr'=>array,
    ));
    $builder->add('affiliation', 'text', array(
      'label'=>'Affiliation',
      'label_attr'=>array
    ));
    $builder->add('department', 'text', array(
      'label'=> 'Department',
      'label_attr'=>array('class'=>'no-asterisk'),
    ));
    $builder->add('email_address', 'email', array(
      'label'=> 'E-mail',
      'label_attr'=>array
    ));
       
    $builder->add('reason', 'choice', array(
      'label_attr'=>array,
      'choices' =>array(
        'Volunteer as a local expert' => 'Volunteer as a local expert',
        'Suggest a new dataset' => 'Suggest a new dataset',
        'Request uploading of dataset' => 'Request uploading of your dataset(s)',
        'General inquiry'    => 'General inquiry or comments',
      )
    ));
    $builder->add('message_body', 'textarea', array(
      'attr' => array('rows'=>'5'),
      'label_attr'=>array,
      'label'=>'Please provide some details about your question/comment',
    ));
    $builder->add('checker', 'text', array(
      'required'=>false,
      'attr'=>array('class'=>'checker'),
      'label_attr'=>array('class'=>'no-asterisk checker')));
    $builder->add('save','submit',array('label'=>'Send'));
  }


  /**
   * Build institutional affiliation options list
   * 
   * @param $affiliationOptions
   */
  public function __construct($affiliationOptions) {
    $this->affiliationOptions = [];

    foreach ($affiliationOptions as $option) {
      $this->affiliationOptions[$option] = $option;
    }
  }


  /**
   * Set defaults
   *
   * @param OptionsResolverInterface
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\ContactFormEmail'
    ));
  }


  public function getName() {
    return 'contactFormEmail';
  }

}

