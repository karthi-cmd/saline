import React from "react";
import { Outlet, Navigate } from "react-router-dom";

const ProtectedRoute = () => {
    let auths={'token':false}
    return  auths.token ?< Outlet />:< Navigate to='/login'/> 
}
export default ProtectedRoute;