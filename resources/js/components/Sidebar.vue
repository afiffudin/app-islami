<template>
    <div id="sidebar" class="w-64 h-full bg-gray-800 text-white">
        <ul>
            <li class="p-4 hover:bg-gray-700" v-for="item in menuItems" :key="item.name">
                <a :href="item.link">{{ item.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menuItems: [
                { name: 'Dashboard', link: '/dashboard' },
                { name: 'Profile', link: '/profile' },
                { name: 'Settings', link: '/settings' },
                { name: 'Logout', link: '/logout' },
            ],
        };
    },
};
</script>

<style scoped>
#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
}
</style>
