// Index.jsx
import React, { useState } from "react";
import StudentList from "./StudentList";
import CreateStudentModal from "./CreateStudentModal";
import { Inertia } from "@inertiajs/inertia";

export default function Index({ students }) {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [studentList, setStudentList] = useState(students);

    const handleStudentCreated = (newStudent) => {
        setStudentList([...studentList, newStudent]);
        setIsModalOpen(false);
    };

    const handleDelete = (id) => {
        Inertia.delete(`/students/${id}`, {
            onSuccess: () => {
                setStudentList(studentList.filter(student => student.id !== id));
            }
        });
    };

    return (
        <div className="p-8">
            <h1 className="text-3xl font-bold mb-6">Students List</h1>
            
            <button
                className="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                onClick={() => setIsModalOpen(true)}
            >
                Create Student
            </button>

            <StudentList students={studentList} onDelete={handleDelete} />

            {isModalOpen && (
                <CreateStudentModal 
                    onClose={() => setIsModalOpen(false)}
                    onStudentCreated={handleStudentCreated} 
                />
            )}
        </div>
    );
}
