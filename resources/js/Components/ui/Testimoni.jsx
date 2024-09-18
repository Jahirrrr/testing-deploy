import { useEffect, useState } from "react";
import axios from "axios";
import { FaStar } from "react-icons/fa";

const Testimoni = () => {
    const [testimonials, setTestimonials] = useState([]);

    useEffect(() => {
        // Replace 'YOUR_API_ENDPOINT' with the actual API endpoint
        axios.get(route("testimoni.getTestimoni"))
            .then(response => {
                // Map the response data to match your component's structure
                const formattedTestimonials = response.data.map(testimonial => ({
                    name: testimonial.nama_testimoni,
                    image: "https://randomuser.me/api/portraits/men/1.jpg", // Placeholder image
                    text: testimonial.body,
                    rating: 5, // Adjust the rating logic if needed
                }));
                setTestimonials(formattedTestimonials);
            })
            .catch(error => {
                console.error("Error fetching testimonials:", error);
            });
    }, []);

    return (
        <>
            <style jsx>{`
                @keyframes marquee {
                    0% {
                        transform: translateY(0%);
                    }
                    100% {
                        transform: translateY(-50%);
                    }
                }

                .animate-marquee {
                    animation: marquee 10s linear infinite;
                }
            `}</style>

            <div className="w-full md:w-6/12 lg:w-4/12 p-4 md:p-6 bg-white rounded-lg shadow-lg overflow-hidden relative">
                <h2 className="text-2xl md:text-3xl font-semibold text-center mb-6 md:mb-8">
                    Testimoni
                </h2>

                <div className="relative overflow-hidden h-[400px] sm:h-[430px] p-4 md:p-5 border rounded-sm">
                    <div className="animate-marquee flex flex-col gap-4 md:gap-6">
                        {[...testimonials, ...testimonials].map((testimonial, index) => (
                            <div key={index} className="bg-white p-4 md:p-6 rounded-lg shadow-lg">
                                <div className="flex items-center mb-3 md:mb-4">
                                    <img
                                        src={testimonial.image}
                                        alt={testimonial.name}
                                        className="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-full object-cover mr-3 md:mr-4"
                                    />
                                    <div>
                                        <h3 className="font-semibold text-base sm:text-lg">
                                            {testimonial.name}
                                        </h3>
                                        <div className="flex">
                                            {Array.from({ length: 5 }).map((_, i) => (
                                                <FaStar key={i} className={i < testimonial.rating ? "text-yellow-400" : "text-gray-300"} />
                                            ))}
                                        </div>
                                    </div>
                                </div>
                                <p className="text-gray-600 text-sm sm:text-base">
                                    {testimonial.text}
                                </p>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
};

export default Testimoni;
