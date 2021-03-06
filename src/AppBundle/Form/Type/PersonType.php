<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

/**
 * Form builder for Person entry
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
 *
 */
class PersonType extends AbstractType {

  /**
   * Build form
   *
   * @param FormBuilderInterface
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('full_name');
    $builder->add('works_here', 'checkbox', array(
      'required'=>false,
      'empty_data'=>null,
      'label'=>'Affiliated with our institution?',
    ));
    $builder->add('kid', 'text', array(
      'required'=>false,
      'label'=>'Username',
    ));
    $builder->add('orcid_id', 'text', array(
      'required' => false,
      'label'    => 'ORCID ID',
    ));
    $builder->add('bio_url', 'text', array(
      'required' => false,
      'label'    => 'Bio URL'
    ));
    $builder->add('email');
    $builder->add('save', 'submit');
  }

  /**
   * Set defaults
   *
   * @param OptionsResolverInterface
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Person'
    ));
  }

  public function getName() {
    return 'person';
  }

}

