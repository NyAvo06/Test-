<template>
    <div>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group ">
                    <input v-model="rech" type="number" class="form-control" placeholder="Identifiant"
                        aria-describedby="button-addon2">
                    <button @click="rechercheByID" class="btn btn-outline-secondary" type="button"
                        id="button-addon2">Rechercher</button>
                </div>
            </div>
            <div class="col-lg-6">
                <router-link class="btn btn-outline-secondary"
                    :to="{ path: '/visiteur-detail', query: { type: 'add' } }">Nouveau
                    Visiteur</router-link>
            </div>
        </div>



        <TableList :head="['Identifiant', 'Nom', 'Age', 'Statut', 'Actions']">
            <tr v-for="vis, i in visiteur" :key="i">
                <td>{{ vis.id }}</td>
                <td>{{ vis.nom }}</td>
                <td>{{ vis.age }}</td>
                <td>{{ vis.statut }}</td>
                <td>
                    <router-link class="btn btn-outline-primary"
                        :to="{ path: '/visiteur-detail', query: { type: 'edit', id: vis.id } }">Modifier</router-link>
                    <button class="btn btn-outline-danger" @click="deleteVis(vis.id)">supprimer</button>
                </td>
            </tr>
        </TableList>
    </div>
</template>
<script>
import TableList from "@/components/Blocs/TableList.vue"
import { mapActions, mapMutations, mapState } from 'vuex'
import axios from 'axios'
export default {
    components: { TableList },
    data() { return { rech: '' } },
    async created() {
        await this.getAllVisiteur()
    },
    computed: {
        ...mapState(['visiteur', 'baseUrl'])
    },
    methods: {
        ...mapMutations(['changeTest']),
        ...mapActions(['getAllVisiteur', 'recherche']),
        async deleteVis(id) {
            await axios.delete(this.baseUrl + 'visiteur/' + id + '/delete').then(res => {
                console.log(res);
                this.getAllVisiteur()
            }).catch(err => {
                console.log(err);
            })

        }
        ,
        rechercheByID() {
            this.recherche(this.rech)
        }

    }
}
</script>