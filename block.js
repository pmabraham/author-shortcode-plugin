(function (blocks, element) {
    var el = element.createElement;

    blocks.registerBlockType('asp/author-info', {
        title: 'Author Info',
        icon: 'admin-users',
        category: 'common',
        edit: function () {
            return el('p', {}, 'Authored By [author_info]');
        },
        save: function () {
            return el('p', {}, 'Authored By [author_info]');
        }
    });
})(
    window.wp.blocks,
    window.wp.element
);
