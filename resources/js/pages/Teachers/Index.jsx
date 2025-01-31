import React, { useState } from "react";
import TeacherList from "./TeacherList";
import CreateTeacherModal from "./CreateTeacherModal";
import EditTeacherModal from "./EditTeacherModal";
import { Inertia } from "@inertiajs/inertia";

export default function Index({ teachers }) {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [selectedTeacher, setSelectedTeacher] = useState(null);
    const [teacherList, setTeacherList] = useState(teachers);

    // Add new teacher
    const handleTeacherCreated = (newTeacher) => {
        setTeacherList([...teacherList, newTeacher]);
        setIsModalOpen(false);
    };

    // Open edit modal
    const handleEditTeacher = (teacher) => {
        setSelectedTeacher(teacher);
        setIsEditModalOpen(true);
    };

    // Update teacher in the list
    const handleUpdateTeacher = (updatedTeacher) => {
        setTeacherList(teacherList.map((t) => (t.id === updatedTeacher.id ? updatedTeacher : t)));
        setIsEditModalOpen(false);
    };

    // Delete teacher
    const handleDeleteTeacher = (id) => {
        if (!confirm("Are you sure you want to delete this teacher?")) return;

        Inertia.delete(`/teachers/${id}`, {
            onSuccess: () => {
                alert("Teacher deleted successfully!");
                setTeacherList(teacherList.filter((t) => t.id !== id));
            },
            onError: (errors) => {
                console.error(errors);
                alert("Failed to delete teacher.");
            },
        });
    };

    return (
        <div className="p-8">
            <h1 className="text-3xl font-bold mb-6">Teachers List</h1>

            <button
                className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                onClick={() => setIsModalOpen(true)}
            >
                Create Teacher
            </button>

            <TeacherList
                teachers={teacherList}
                onEdit={handleEditTeacher}
                onDelete={handleDeleteTeacher}
            />

            {isModalOpen && (
                <CreateTeacherModal 
                    onClose={() => setIsModalOpen(false)}
                    onTeacherCreated={handleTeacherCreated} 
                />
            )}

            {isEditModalOpen && selectedTeacher && (
                <EditTeacherModal 
                    teacher={selectedTeacher}
                    onClose={() => setIsEditModalOpen(false)}
                    onTeacherUpdated={handleUpdateTeacher}
                />
            )}
        </div>
    );
}
