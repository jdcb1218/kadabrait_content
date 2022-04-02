<?php
namespace Drupal\kadabrait_content\Plugin\Block;
 
use Drupal\Core\Block\BlockBase;
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
        return [
            '#type' => 'markup',
            '#markup' => 'Esto es un bloque de pruebas!!',
        ];
    }
    /**
      * {@inheritdoc}
      */
   /* protected function blockAccess(AccountInterface $account) {
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }     */
}