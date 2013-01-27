<div class="nav-collapse collapse">
    <ul class="nav <?php echo (!empty($secondary)) ? 'secondary-nav pull-right' : ''; ?>" >
        <?php foreach($menu as $item) : ?>
            <li class="divider-vertical"></li>
            <?php if (!isset($item['dropdown'])) : ?>
                <?php $itemTitle = (!empty($item['iconClass'])) ? "<i class='{$item['iconClass']}'></i>&nbsp;&nbsp;{$item['title']}" : $item['title']; ?>
                <li><?php echo $this->Html->link($itemTitle, $item['url'], array('escape' => false)); ?></li>
            <?php else: ?>
                <li class="dropdown">
                    <?php $itemTitle = (!empty($item['iconClass'])) ? "<i class='{$item['iconClass']}'></i>&nbsp;&nbsp;{$item['title']}" : $item['title']; ?>
                    <?php echo $this->Html->link($itemTitle.'<b class="caret"></b>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false)); ?>
                    <ul class="dropdown-menu">
                        <?php foreach($item['dropdown'] as $subItem): ?>
                            <?php $subItemTitle = (!empty($subItem['iconClass'])) ? "<i class='{$subItem['iconClass']}'></i>&nbsp;&nbsp;{$subItem['title']}" : $subItem['title']; ?>
                            <li><?php echo $this->Html->link($subItemTitle, $subItem['url'], array('escape' => false)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>