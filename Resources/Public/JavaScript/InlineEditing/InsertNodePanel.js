define(
	[
		'emberjs',
		'Library/underscore',
		'vie/instance',
		'Content/Application',
		'text!./InsertNodePanel.html'
	],
	function (Ember, _, vie, ContentModule, template) {
		return Ember.View.extend({
			template: Ember.Handlebars.compile(template),

			id: 'deleteNodeDialog',

			_node: null,
			_entity: null,
			_index: null,

			content: function() {
				var groups = {};

				_.each(this.get('_entity._enclosingCollectionWidget').options.definition.range, function(nodeType) {
					var type = this.get('_entity._enclosingCollectionWidget').options.vie.types.get(nodeType);
					type.metadata.nodeType = type.id.substring(1, type.id.length - 1).replace(ContentModule.TYPO3_NAMESPACE, '');

					if (type.metadata.ui && type.metadata.ui.group) {
						if (!groups[type.metadata.ui.group]) {
							groups[type.metadata.ui.group] = {
								name: type.metadata.ui.group,
								children: []
							};
						}
						groups[type.metadata.ui.group].children.push(type.metadata);
					}
				}, this);

				// Make the data object an array for usage in #each helper
				var data = [];
				T3.Configuration.nodeTypeGroups.forEach(function(groupName) {
					if (groups[groupName]) {
						data.push(groups[groupName]);
					}
				});

				return data;
			}.property(),


			insertNode: function(nodeType) {
				T3.Content.Controller.NodeActions.set('_elementIsAddingNewContent', this.get('_entity').getSubjectUri());

				this.get('_entity._enclosingCollectionWidget').options.collection.add({
					'@type': 'typo3:' + nodeType
				}, {at: this.get('_index')});

				this.destroy();
			},

			cancel: function() {
				this.destroy();
			}
		});
	}
);