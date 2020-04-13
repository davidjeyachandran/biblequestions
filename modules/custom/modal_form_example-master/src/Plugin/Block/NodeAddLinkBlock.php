<?php

namespace Drupal\modal_form_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;

/**
 * Provides a 'LoginBlock' block.
 *
 * @Block(
 *  id = "node_add_link_block",
 *  admin_label = @Translation("Node add link"),
 * )
 */
class NodeAddLinkBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $link = Link::createFromRoute(
      'Create Question',
      'node.add',
      ['node_type' => 'question'],
      [
        'attributes' => [
          'class' => 'use-ajax',
          'data-dialog-type' => 'modal',
          'data-dialog-options' => json_encode([
            'width' => 800,
            'height' => 500,
          ]),
        ],
      ]
    );
    $build = [];
    $build['#attached']['library'] = [
      'core/drupal.dialog.ajax',
      'core/jquery.form',
    ];
    $build['login_block'] = $link->toRenderable();

    return $build;
  }

}
