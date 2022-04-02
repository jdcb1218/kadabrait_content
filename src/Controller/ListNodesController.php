<?php

namespace Drupal\kadabrait_content\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Class ListNodesController
 * @package Drupal\kadabrait_content\Controller
 */

class ListNodesController extends ControllerBase {
  /**
   * @return array
   */
  public function index(){

    $data = ListNodesController::getnodes();

    if ($data) {
      $header = [
        'col1' => t('Title'),
        'col2' => t('Nid'),
      ];
      foreach ($data as $key => $value) {
        $node = Node::load($value);
        $rows[$key] = array('0' => $node->getTitle(), '1' => $value);
      }
      return [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $rows,
      ];
    }else{
      return false;
    }
  }

  /**
   * @return array
   */

  public function getnodes(){

    $uid = \Drupal::currentUser()->id();

    $results = [];
    $results = \Drupal::entityQuery('node')
      ->condition('status', 1, '=')
      ->condition('uid', $uid)
      ->sort('nid','DESC')
      ->range(0, 10)
      ->execute();
      return $results;
  }
}