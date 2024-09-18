import React from "react";

const LoadingComponent = () => {
  return (
    <div className="flex justify-center items-center min-h-screen bg-gray-50">
      <div className="flex flex-col items-center">
        {/* Spinner */}
        <div className="relative">
          <div className="w-16 h-16 border-4 border-teal-500 border-t-transparent rounded-full animate-spin shadow-lg"></div>
        </div>

        {/* Animasi teks di bawah spinner */}
        <div className="mt-6">
          <p className="text-gray-600 font-medium text-lg animate-bounce">
            Memuat data, harap tunggu...
          </p>
        </div>
      </div>
    </div>
  );
};

export default LoadingComponent;
