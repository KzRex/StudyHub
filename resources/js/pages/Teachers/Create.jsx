import React, { useState } from "react";
import { useForm } from "@inertiajs/react";

export default function Create() {
    const { data, setData, post, errors } = useForm({
        fullname: "",
        email: "",
        subject_id: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/teachers");
    };

    return (
        <form onSubmit={handleSubmit}>
            <div>
                <label>Full Name</label>
                <input
                    type="text"
                    value={data.fullname}
                    onChange={(e) => setData("fullname", e.target.value)}
                />
                {errors.fullname && <p>{errors.fullname}</p>}
            </div>
            <div>
                <label>Email</label>
                <input
                    type="email"
                    value={data.email}
                    onChange={(e) => setData("email", e.target.value)}
                />
                {errors.email && <p>{errors.email}</p>}
            </div>
            <button type="submit">Create</button>
        </form>
    );
}
