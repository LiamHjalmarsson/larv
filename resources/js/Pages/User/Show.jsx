const UserShow = ({user}) => {
    
    console.log(user);
    return (
        <>
            <div>
                <div>
                    <h2>
                        {user.username}
                    </h2>
                    <img src={user.avatar} alt="" />
                </div>
            </div>
        </>
    );
}

export default UserShow;