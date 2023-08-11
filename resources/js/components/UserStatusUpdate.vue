<template>
    <div class="user-status-updater">
        <input
            type="checkbox"
            :id="'switch-' + userId"
            :checked="status === 1"
            @change="updateStatus"
            class="status-switch"
        />
        <label :for="'switch-' + userId" class="switch"></label>
    </div>
</template>

<style scoped>
.user-status-updater {
    position: relative;
    display: inline-block;
}

.status-switch {
    display: none;
}

.switch {
    position: absolute;
    top: 0;
    left: 0;
    width: 36px;
    height: 20px;
    background-color: #ccc;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.switch::before {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    background-color: white;
    border-radius: 50%;
    left: 2px;
    top: 2px;
    transition: transform 0.3s ease;
}

.status-switch:checked + .switch {
    background-color: #6abf59;
}

.status-switch:checked + .switch::before {
    transform: translateX(16px);
}
</style>

<script>
export default {
    props: {
        userId: Number,
        status: Number,
        csrfToken: String,
        updateUrl: String
    },
    methods: {
        updateStatus() {
            const newStatus = this.status === 1 ? 0 : 1;

            fetch(this.updateUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    user_id: this.userId,
                    new_status: newStatus
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message); // Manejar la respuesta del servidor si es necesario
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
};
</script>