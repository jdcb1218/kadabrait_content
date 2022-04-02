<?php
namespace Drupal\kadabrait_content\Plugin\Block;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Block\BlockBase;
use Drupal\kadabrait_content\Controller\ListNodesController;

/**
 * Definición de nuestro bloque
 *
 * @Block(
 *   id = "block_my_content",
 *   admin_label = @Translation("Bloque (My content)")
 * )
 */

class KadabraBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {
        
        $data = ListNodesController::getnodes_recent();
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
      * {@inheritdoc}
      */
   /* protected function blockAccess(AccountInterface $account) {
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }     */
}