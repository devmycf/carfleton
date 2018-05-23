<?php
/**
 * @version		$Id: default.php 10136 2011-12-07 11:09:45Z hieudm $
 * @package		Joomla.Site
 * @subpackage	com_newsfeeds
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>

<div class="com-weblink <?php echo $this->pageclass_sfx; ?>">
	<div class="web-link-category-list">
		<?php if ($this->params->get('show_page_heading', 1)) : ?>
		<h2 class="componentheading">
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h2>
		<?php endif; ?>

		<?php if ($this->params->get('show_base_description')) : ?>
			<?php 	//If there is a description in the menu parameters use that; ?>
				<?php if($this->params->get('categories_description')) : ?>
					<div class="contentdescription clearafter">
					<?php echo  JHtml::_('content.prepare',$this->params->get('categories_description')); ?>
					</div>
				<?php  else: ?>
					<?php //Otherwise get one from the database if it exists. ?>
					<?php  if ($this->parent->description) : ?>
						<div class="contentdescription clearafter">
							<?php  echo JHtml::_('content.prepare', $this->parent->description); ?>
						</div>
					<?php  endif; ?>
				<?php  endif; ?>
			<?php endif; ?>
		<?php
		echo $this->loadTemplate('items');
		?>
	</div>
</div>