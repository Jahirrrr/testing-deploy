import React from "react";

// Card Component
const Card = ({ children, className = "" }) => {
    return (
        <div className={`card ${className}`}>
            {children}
        </div>
    );
};

// CardImage Subcomponent
const CardImage = ({ src, alt, className = "" }) => {
    return (
        <figure className={className}>
            <img src={src} alt={alt} />
        </figure>
    );
};

// CardBody Subcomponent
const CardBody = ({ children, className = "" }) => {
    return <div className={`card-body ${className}`}>{children}</div>;
};

// CardTitle Subcomponent
const CardTitle = ({ children, className = "" }) => {
    return <h2 className={`card-title ${className}`}>{children}</h2>;
};

// CardActions Subcomponent
const CardActions = ({ children, className = "" }) => {
    return (
        <div className={`card-action ${className}`}>
            {children}
        </div>
    );
};

export { Card, CardImage, CardBody, CardTitle, CardActions };
