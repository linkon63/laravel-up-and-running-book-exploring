<!-- resources/js/components/MyForm.vue -->
<template>
    <Head title="Test" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Friends
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl p-2 font-bold">Friend list</h1>

                        <div
                            class="mb-4 border-b border-gray-200 dark:border-gray-700"
                        >
                            <ul
                                class="flex flex-wrap -mb-px text-sm font-medium text-center"
                                id="default-tab"
                                data-tabs-toggle="#default-tab-content"
                                role="tablist"
                            >
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg"
                                        id="profile-tab"
                                        data-tabs-target="#profile"
                                        type="button"
                                        role="tab"
                                        aria-controls="profile"
                                        aria-selected="false"
                                        @click="state.selectedTabs = 0"
                                    >
                                        Your Friends
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="dashboard-tab"
                                        data-tabs-target="#dashboard"
                                        type="button"
                                        role="tab"
                                        aria-controls="dashboard"
                                        aria-selected="false"
                                        @click="state.selectedTabs = 1"
                                    >
                                        Suggested Friends
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content">
                            <div
                                class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                                id="profile"
                                role="tabpanel"
                                aria-labelledby="profile-tab"
                                v-if="state.selectedTabs == 0"
                            >
                                Your Friends
                                <div class="relative overflow-x-auto mt-5">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                    >
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                        >
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    SN
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Name
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Email
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                                v-for="(t, index) in friends"
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
                                                <th
                                                    scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                                >
                                                    {{ t?.email }}
                                                </th>
                                                <td
                                                    class="px-6 py-4 border w-[220px]"
                                                >
                                                    <div class="flex">
                                                        <button
                                                            class="p-2 border ms-2 bg-red-700 text-white rounded w-3/6 font-extrabold"
                                                            gradient="red"
                                                            size="xl"
                                                            @click="
                                                                removeFriend(
                                                                    t.id
                                                                )
                                                            "
                                                        >
                                                            -
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div
                                class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                                id="dashboard"
                                role="tabpanel"
                                aria-labelledby="dashboard-tab"
                                v-if="state.selectedTabs == 1"
                            >
                                Suggested Friends
                                <div class="relative overflow-x-auto mt-5">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                    >
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                        >
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    SN
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Name
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Email
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3"
                                                >
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                                v-for="(t, index) in users"
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
                                                <th
                                                    scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                                >
                                                    {{ t?.email }}
                                                </th>
                                                <td
                                                    class="px-6 py-4 border w-[220px]"
                                                >
                                                    <div class="flex">
                                                        <button
                                                            class="p-2 border w-3/6 font-extrabold"
                                                            gradient="red-yellow"
                                                            square
                                                            @click="
                                                                addFriend(t)
                                                            "
                                                        >
                                                            +
                                                        </button>
                                                        <button
                                                            class="p-2 border ms-2 bg-red-700 text-white rounded w-3/6 font-extrabold"
                                                            gradient="red"
                                                            size="xl"
                                                            @click="
                                                                removeSuggestedFriend()
                                                            "
                                                        >
                                                            -
                                                        </button>
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

const props = defineProps({ users: Object, friends: Object, status: Boolean });
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
    selectedTabs: 0,
    // editUser: false,
    // selectedUserId: null,
});

const addFriend = (friend) => {
    console.log("addFriend", friend);
    router.post("/friend", { friend: friend.id });
};

const removeSuggestedFriend = (friend) => {
    console.log("addFriend", friend);
};

const removeFriend = (id) => {
    router.delete(`/friend/${id}`);
};
// const submitForm = () => {
//     console.log("Inner submit", form.name, form.phone);
//     router.post("/test", form);
//     form.name = null;
//     form.phone = null;
// };
// const updateFormSubmit = () => {
//     updateForm.id = state.selectedUserId;
//     console.log(
//         "Inner submit",
//         updateForm.id,
//         updateForm.name,
//         updateForm.phone
//     );
//     router.patch("/test", updateForm);
// };
// const deleteTest = (id) => {
//     router.delete(`/test/${id}`);
// };
</script>
