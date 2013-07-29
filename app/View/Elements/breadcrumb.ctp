<ul class="breadcrumb">
	<?php foreach($links as $link): ?>
	<li class="<?php echo ( empty($link['link']) ? 'active' : '' ); ?>">
		<?php if (!empty($link['link'])): ?>
			<?php echo $this->Html->link(
				$link['label'],
				$link['link']
			); ?>
			<span class="divider">/</span>
		<?php else: ?>
			<?php echo $link['label'] ?>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul>