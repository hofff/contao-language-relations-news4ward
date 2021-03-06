<?php

call_user_func(function() {
	$relations = new Hofff\Contao\LanguageRelations\Relations(
		'tl_hofff_language_relations_news4ward',
		'hofff_language_relations_news4ward_item',
		'hofff_language_relations_news4ward_relation'
	);

	$config = new Hofff\Contao\LanguageRelations\DCA\RelationsDCABuilderConfig;
	$config->setRelations($relations);
	$config->setAggregateFieldName('pid');
	$config->setAggregateView('hofff_language_relations_news4ward_aggregate');
	$config->setTreeView('hofff_language_relations_news4ward_tree');
	$config->setSelectriDataFactoryConfiguratorCallback(
		function(Hofff\Contao\Selectri\Model\Tree\SQLAdjacencyTreeDataFactory $factory) {
			$factory->getConfig()->addColumns([ 'date', 'type' ]);
			$factory->getConfig()->setOrderByExpr('date DESC, title');
		}
	);
	$config->setSelectriNodeLabelTemplate('hofff_language_relations_news4ward_node_label');

	$builder = new Hofff\Contao\LanguageRelations\DCA\RelationsDCABuilder($config);
	$builder->build($GLOBALS['TL_DCA']['tl_news4ward_article']);
});
