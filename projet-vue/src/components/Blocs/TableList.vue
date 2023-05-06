<template>
    <div>
        <table class="table table-striped">
            <thead>
                <th v-for="he, i in head" :key="i">{{ he }}</th>
            </thead>
            <tbody>
                <slot></slot>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        head: {
            type: Array,
            required: true
        },
    }
}
</script>