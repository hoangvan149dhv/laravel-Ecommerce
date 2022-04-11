<template>
    <ul class="navbar-nav">
        <li v-for="(itemsMenu, i) in menu" :class="`nav-item ${itemsMenu.items ? 'dropdown' : ''}`">
            <template v-if="itemsMenu.items">
                <a class="nav-link dropdown-toggle" :id="`item_${i}`"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{
                        itemsMenu.title
                    }}</a>
                <div class="dropdown-menu" :aria-labelledby="`item_${i}`">
                    <a v-for="item in itemsMenu.items" class="dropdown-item" :href="item.link">{{ item.name }}</a>
                </div>
            </template>
            <a v-else class="nav-link" :href="itemsMenu.link">{{ itemsMenu.title }}</a>
        </li>
    </ul>
</template>
<script>
export default {
    data() {
        return {
            menu: [
                {title: 'home', link: '/'},
                {
                    title: 'Shop', items: [
                        {link: 'category.html', name: 'category'},
                        {link: 'product.html', name: 'product'},
                        {link: 'cart.html', name: 'cart'}
                    ]
                },
                {
                    title: 'Blog', items: [
                        {link: 'blog.html', name: 'Blog'},
                    ]
                },
                {title: 'contact', link: '/contact'}
            ]
        }
    },
};
</script>
