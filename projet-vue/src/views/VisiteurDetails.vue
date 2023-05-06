<template>
    <div>

        <div v-if="$route.query.type == 'add'">
            <h1>Ajouter Nouveau Visiteur</h1>
        </div>
        <div v-if="$route.query.type == 'edit'">
            <h1>Modification</h1>
        </div>

        <div :class="errors.status" v-if="errors.status">
            {{ errors.message }}
        </div>
        <form @submit.prevent="submitted">
            <div class="mb-3">
                <label  class="form-label">Nom</label>
                <input type="text" placeholder="nom" v-model="form.nom" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Age</label>
                <input placeholder="age" v-model="form.age" type="number" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
import { mapActions, mapState } from 'vuex';
export default {

    async created() {
        if (this.$route.query.type == 'edit') {
            await this.getAllVisiteurDetails(this.$route.query.id)
            this.form = {
                nom: this.visiteurDetail.nom,
                age: this.visiteurDetail.age,
            }
        }
    },
    data() {
        return {
            form: {
                nom: "",
                age: ""
            },
            errors: {
                status: "",
                message: "",
                show: false
            }
        }
    },
    computed: {
        ...mapState(['baseUrl', 'visiteurDetail'])
    },
    methods: {
        ...mapActions(['getAllVisiteurDetails']),
        submitted() {
            switch (this.$route.query.type) {
                case 'add':
                    this.addVisiteur()
                    break;
                case 'edit':
                    this.updateVisiteur()
                    break;
            }
        },

        async addVisiteur() {
            await axios.post(this.baseUrl + 'visiteur', this.form).then(res => {
                if (res.status == 200) {
                    this.errors = {
                        status: "success",
                        message: "Ajout avec success",
                        show: true
                    }
                    setTimeout(() => {
                        this.$router.push({ path: "/visiteur" })
                    }, 2000);
                }
            }).catch(err => {
                console.log(err);
                this.errors = {
                    status: "error",
                    message: " tous les champs sont requis",
                    show: true
                }
            })
        },
        async updateVisiteur() {
            await axios.put(this.baseUrl + 'visiteur/' + this.$route.query.id + '/edit', this.form).then(res => {
                if (res.status == 200) {
                    this.errors = {
                        status: "success",
                        message: "Modification avec success",
                        show: true
                    }
                    setTimeout(() => {
                        this.$router.push({ path: "/visiteur" })
                    }, 2000);
                }
            }).catch(err => {
                console.log(err);
                this.errors = {
                    status: "error",
                    message: " tous les champs sont requis",
                    show: true
                }
            })
        },
    }
}
</script>

<style>
.success {
    background-color: green;
    color: white;
    padding: 5px;
}

.error {
    background-color: red;
    color: white;
    padding: 5px;
}
</style>