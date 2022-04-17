<template>
    <div class="card p-3">
        <h3 class="text-center">{{ $t('addStudent') }}</h3>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form @submit.prevent="addStudent">
                    <div class="form-group">
                        <label>{{ $t('name') }}</label>
                        <input type="text" class="form-control" required v-model="student.name">
                        <span v-if="errors.name" :class="['label text-danger']">{{ errors.name[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('lastname') }}</label>
                        <input type="text" class="form-control" required v-model="student.lastname">
                        <span v-if="errors.lastname" :class="['label text-danger']">{{ errors.lastname[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('documentType') }}</label>
                        <select  class="form-control" required v-model="student.document_type">
                            <option disabled value="" selected>{{ $t('pleaseSelect') }}</option>
                            <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                            <option value="NUIP">NUIP</option>
                        </select>
                        <span v-if="errors.document_type" :class="['label text-danger']">{{ errors.document_type[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('documentNumber') }}</label>
                        <input type="number" class="form-control" required v-model="student.document_number">
                        <span v-if="errors.document_number" :class="['label text-danger']">{{ errors.document_number[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('gender') }}</label>
                        <select class="form-control" required v-model="student.gender">
                            <option disabled value="">{{ $t('pleaseSelect') }}</option>
                            <option value="0">{{ $t('undetermined') }}</option>
                            <option value="1">{{ $t('female') }}</option>
                            <option value="2">{{ $t('male') }}</option>
                        </select>
                        <span v-if="errors.gender" :class="['label text-danger']">{{ errors.gender[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('birthdate') }}</label>
                        <input type="date" class="form-control" required v-model="student.birthdate">
                        <span v-if="errors.birthdate" :class="['label text-danger']">{{ errors.birthdate[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label>{{ $t('career') }}</label>
                        <input type="text" class="form-control" required v-model="student.career">
                        <span v-if="errors.career" :class="['label text-danger']">{{ errors.career[0] }}</span>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ $t('addStudent') }}</button>
                    <div v-if="loading" class="spinner-grow text-success px-2" role="status">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            student: {
                gender: '',
                document_type: ''
            },
            errors: [],
            loading: false
        }
    },
    methods: {
        addStudent() {
            this.loading = true
            this.axios
                .post('http://localhost:8000/api/student/store', this.student)
                .then(response => (
                    this.$router.push({name: 'home'})
                    // console.log(response.data)
                ))
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
                .finally(() => this.loading = false)
        }
    }
}
</script>
