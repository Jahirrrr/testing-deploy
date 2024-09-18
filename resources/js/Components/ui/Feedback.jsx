import axios from "axios";
import React, { useState } from "react";
import { FaCheckCircle, FaExclamationCircle, FaSpinner } from "react-icons/fa";

const Feedback = () => {
    const [nama, setNama] = useState("");
    const [email, setEmail] = useState("");
    const [comment, setComment] = useState("");
    const [loading, setLoading] = useState(false);
    const [successMessage, setSuccessMessage] = useState("");
    const [errorMessage, setErrorMessage] = useState("");

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setSuccessMessage("");
        setErrorMessage("");

        try {
            const response = await axios.post(route("feedback.storeFeedback"), {
                nama,
                email,
                comment,
            });
            if (response.status === 200) {
                setSuccessMessage("Feedback berhasil dikirim! Terima kasih atas masukan Anda.");
                setNama("");
                setComment("");
                setEmail("");
            }
        } catch (error) {
            setErrorMessage("Terjadi kesalahan saat mengirim feedback. Silakan coba lagi.");
            console.error(error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="w-full max-w-lg flex-grow bg-white p-6 rounded-lg shadow-lg flex flex-col">
            <h2 className="text-center font-bold text-2xl md:text-3xl text-gray-800 mb-6">
                Feedback & Saran
            </h2>

            {/* Success or Error Message */}
            {successMessage && (
                <div className="flex items-center justify-center mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-md">
                    <FaCheckCircle className="mr-2" />
                    <p>{successMessage}</p>
                </div>
            )}
            {errorMessage && (
                <div className="flex items-center justify-center mb-4 bg-red-100 text-red-700 px-4 py-2 rounded-md">
                    <FaExclamationCircle className="mr-2" />
                    <p>{errorMessage}</p>
                </div>
            )}

            <form onSubmit={handleSubmit} className="space-y-6">
                {/* Name Field */}
                <div>
                    <label
                        htmlFor="name"
                        className="block text-sm font-medium text-gray-700"
                    >
                        Nama
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value={nama}
                        onChange={(e) => setNama(e.target.value)}
                        className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        placeholder="Nama Anda"
                        required
                    />
                </div>

                {/* Email Field */}
                <div>
                    <label
                        htmlFor="email"
                        className="block text-sm font-medium text-gray-700"
                    >
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        placeholder="Email Anda"
                        required
                    />
                </div>

                {/* Comment Field */}
                <div>
                    <label
                        htmlFor="comment"
                        className="block text-sm font-medium text-gray-700"
                    >
                        Komentar
                    </label>
                    <textarea
                        id="comment"
                        name="comment"
                        value={comment}
                        onChange={(e) => setComment(e.target.value)}
                        rows="4"
                        className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        placeholder="Masukkan komentar atau saran Anda"
                        required
                    />
                </div>

                {/* Submit Button */}
                <div className="flex justify-center">
                    <button
                        type="submit"
                        className="flex items-center justify-center px-12 py-2 bg-primary text-white font-semibold rounded-md shadow-md hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 transition duration-200"
                        disabled={loading}
                    >
                        {loading ? (
                            <FaSpinner className="animate-spin mr-2" />
                        ) : (
                            "Kirim"
                        )}
                    </button>
                </div>
            </form>
        </div>
    );
};

export default Feedback;
