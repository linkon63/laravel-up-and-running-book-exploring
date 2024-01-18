<!-- resources/js/components/MyForm.vue -->
<template>
    <Head title="Test" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- test form -->
                        <form
                            class="max-w-sm mx-auto"
                            @submit.prevent="submitForm"
                        >
                            <div class="mb-5">
                                <label
                                    for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Post Title</label
                                >
                                <input
                                    type="text"
                                    id="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your Post Title"
                                    v-model="form.title"
                                    required
                                />
                            </div>
                            <div class="mb-5">
                                <label
                                    for="descriptions"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Your Post Description</label
                                >
                                <input
                                    type="text"
                                    id="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your post description here..."
                                    v-model="form.description"
                                    required
                                />
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                Submit
                            </button>
                        </form>
                        {{ post  ? post : 'no post is there'}}
                    </div>
                </div>
            </div>
        </div>
        <div></div>
    </AuthenticatedLayout>
</template>

<script setup>
import { reactive } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const props = defineProps({ post: Object, status: Boolean });

const form = reactive({
    title: "",
    description: "",
});
const updateForm = reactive({
    id: null,
    name: null,
    phone: null,
});

const state = reactive({
    editUser: false,
    selectedUserId: null,
});

const submitForm = () => {
    console.log("Inner submit", form.title, form.description);
    router.post("/post", form);
    form.name = null;
    form.phone = null;
};
const updateFormSubmit = () => {
    updateForm.id = state.selectedUserId;
    console.log(
        "Inner submit",
        updateForm.id,
        updateForm.name,
        updateForm.phone
    );
    router.patch("/test", updateForm);
};
const deleteTest = (id) => {
    router.delete(`/test/${id}`);
};
</script>
