<!-- resources/js/components/MyForm.vue -->
<template>
    <Head title="Test" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Test
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
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Your name</label
                                >
                                <input
                                    type="text"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your name"
                                    v-model="form.name"
                                    required
                                />
                            </div>
                            <div class="mb-5">
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Your Phone</label
                                >
                                <input
                                    type="text"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="+8801XXX-XXXXXX"
                                    v-model="form.phone"
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

                        <!-- test table -->
                        <h1 class="p-4 text-2xl">Your Test DB</h1>
                        <div class="relative overflow-x-auto mt-5">
                            <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            SN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Test Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Phone
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                        v-for="(t, index) in test"
                                        @mouseover="state.selectedUserId = t.id"
                                        @mouseleave="state.editUser = false"
                                    >
                                        <td class="px-6 py-4">
                                            {{ index + 1 }}
                                        </td>

                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        >
                                            {{ t?.name }}
                                        </th>
                                        <td class="px-6 py-4">{{ t.phone }}</td>
                                        <td class="px-6 py-4 border w-[220px]">
                                            <div class="flex">
                                                <button
                                                    class="p-2 border w-3/6"
                                                    gradient="red-yellow"
                                                    square
                                                    @click="
                                                        state.editUser =
                                                            !state.editUser;
                                                        updateForm.name =
                                                            t.name;
                                                        updateForm.phone =
                                                            t.phone;
                                                    "
                                                >
                                                    <svg
                                                        class="w-5 h-5"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            clip-rule="evenodd"
                                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                            fill-rule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                                <button
                                                    class="p-2 border ms-2 bg-red-700 text-white rounded w-3/6"
                                                    gradient="red"
                                                    size="xl"
                                                    @click="deleteTest(t.id)"
                                                >
                                                    X
                                                </button>
                                            </div>
                                            <div
                                                v-if="
                                                    state.editUser &&
                                                    state.selectedUserId == t.id
                                                "
                                            >
                                                <form
                                                    class="w-4/6"
                                                    @submit.prevent="
                                                        updateFormSubmit
                                                    "
                                                    :v-model="updateForm"
                                                >
                                                    <div class="mb-5 w-full">
                                                        <label
                                                            for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                            >Your name</label
                                                        >
                                                        <input
                                                            type="text"
                                                            id="name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Your name"
                                                            :value="
                                                                updateForm.name
                                                            "
                                                            @change="
                                                                (e) =>
                                                                    (updateForm.name =
                                                                        e.target.value)
                                                            "
                                                            required
                                                        />
                                                    </div>
                                                    <div class="mb-5 w-full">
                                                        <label
                                                            for="phone"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                            >Your Phone</label
                                                        >
                                                        <input
                                                            type="text"
                                                            id="phone"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="+8801XXX-XXXXXX"
                                                            :value="
                                                                updateForm.phone
                                                            "
                                                            @change="
                                                                (e) =>
                                                                    (updateForm.phone =
                                                                        e.target.value)
                                                            "
                                                            required
                                                        />
                                                    </div>
                                                    <button
                                                        type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    >
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

const props = defineProps({ test: Object, status: Boolean });

const form = reactive({
    name: null,
    phone: null,
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
    console.log("Inner submit", form.name, form.phone);
    router.post("/test", form);
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
