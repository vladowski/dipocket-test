<template>
  <div class="row justify-content-center">
    <div class="alert alert-danger" role="alert" v-if="this.error">
      {{ this.error }}
    </div>
    <form @submit.prevent="submitForm" class="col-6 needs-validation" novalidate>
      <div class="form-group">
        <label for="keyword">Keyword:</label>
        <input class="form-control" type="text" id="keyword" v-model="keyword" required minlength="3" :class="{'is-invalid': this.keyword && !formIsValid}">
        <div class="invalid-feedback">
          Keyword must be 3 or more chars length
        </div>
      </div>
      <div class="form-group mt-2">
        <label for="language">Language:</label>
        <select class="form-control" id="language" v-model="language">
          <option value="en-US">English</option>
          <option value="de-DE">German</option>
          <option value="fr-FR">French</option>
        </select>
      </div>
      <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary" v-if="!loading" :disabled="!formIsValid">Submit</button>

        <button class="btn btn-primary" disabled v-if="loading"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>
      </div>
    </form>
    <div class="row">
      <table v-if="results" class="table col-8">
        <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Source</th>
          <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(result, index) in results" :key="index">
          <td>{{ result.title }}</td>
          <td v-html="result.description"></td>
          <td><a :href="result.source">link</a></td>
          <td>{{ result.date }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
const backendUrl = import.meta.env.VITE_BACKEND_URL;

export default {
  data() {
    return {
      keyword: '',
      language: 'en-US',
      results: [],
      loading: false,
      error: null
    }
  },
  computed: {
    formIsValid() {
      return this.keyword && this.keyword.length >= 3;
    }
  },
  methods: {
    async submitForm() {
      this.loading = true;
      try {
        const response = await fetch(backendUrl + `/?keyword=${this.keyword}&language=${this.language}`);
        if (!response.ok) {
          throw new Error('Server returned an error.');
        }
        const data = await response.json();
        if (!data.results) {
          throw new Error('Invalid response from server.');
        }
        this.results = data.results;
        this.error = null;
      } catch (err) {
        this.error = err.message;
        this.results = [];
      }
      this.loading = false;
    }
  }
}
</script>
