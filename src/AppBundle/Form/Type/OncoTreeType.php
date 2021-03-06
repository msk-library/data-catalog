<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form builder for OncoTree form entry
 *
 *   Custom entity added by MSK for specific institutional use:
 *   Oncotree codes are used for standardizing cancer type diagnosis.
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
class OncoTreeType extends AbstractType {

  /**
   * Build form
   *
   * @param FormBuilderInterface
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('onco_tree_name');
    $builder->add('onco_tree_code');
    $builder->add('onco_tree_main_type');
    $builder->add('onco_tree_tissue');
    $builder->add('onco_tree_parent');
    $builder->add('onco_tree_nci');
    $builder->add('onco_tree_umls');
    $builder->add('save','submit',array('label'=>'Submit'));
  }

  /**
   * Set default
   *
   * @param OptionsResolverInterface
   */
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\OncoTree'
    ));
  }

  public function getName() {
    return 'oncoTree';
  }

}

