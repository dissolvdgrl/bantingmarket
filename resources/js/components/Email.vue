<template>
    <span>
        <a :href="this.prefix + this.email">{{ this.email }}</a>
    </span>
</template>

<script>
    export default {
        data() {
            return {
                prefix: 'mailto:',
                email: 'info@realfoodmarket.info'
            }
        }
    }
</script>
