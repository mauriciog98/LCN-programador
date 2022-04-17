<template>
    <div class="card p-3">
        <h3 class="text-center">{{ $t('titles.allStudents') }}</h3><br/>
        <div v-if="loading"  class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
            </div>
        </div>
        <table v-else class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ $t('name') }}</th>
            <th>{{ $t('lastname') }}</th>
            <th>{{ $t('documentType') }}</th>
            <th>{{ $t('documentNumber') }}</th>
            <th>{{ $t('createdAt') }}</th>
            <th>{{ $t('updatedAt') }}</th>
            <th>{{ $t('actions') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="student in students" :key="student.id">
        <td>{{ student.id }}</td>
        <td>{{ student.name }}</td>
        <td>{{ student.lastname }}</td>
        <td>{{ student.document_type }}</td>
        <td>{{ student.document_number }}</td>
        <td>{{ student.created_at }}</td>
        <td>{{ student.updated_at }}</td>
        <td>
        <div class="btn-group" role="group">
            <router-link :to="{name: 'edit', params: { id: student.id }}" class="btn btn-primary">{{ $t('edit') }}
            </router-link>
            <button class="btn btn-danger" @click="deleteStudent(student.id)">{{ $t('delete') }}</button>
    </div>
</td>
    </tr>
    </tbody>
    </table>
    </div>
    </template>

<script>
export default {
    data() {
        return {
            students: [],
            loading: true
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/students')
            .then(response => {
                this.students = response.data;
                this.loading = false;
            });
    },
    methods: {
        deleteStudent(id) {
            this.axios
                .delete(`http://localhost:8000/api/student/delete/${id}`)
                .then(response => {
                    let i = this.students.map(item => item.id).indexOf(id); // find index of object
                    this.students.splice(i, 1)
                });
        }
    }
}
</script>
