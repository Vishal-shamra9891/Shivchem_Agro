<?php
session_start();
include "connection.php"; // Ensure this file connects to your database

// Check if the user is logged in and is an admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="header-top">
                    <div class="search">
                        <div class="header-icon">
                            <img src="icons/magnify.svg" alt="search button" />
                        </div>
                        <input type="text" class="search-box" />
                    </div>
                    <div class="profile">
                        <div class="header-icon">
                            <img
                                src="icons/bell-ring-outline.svg"
                                alt="search button"
                            />
                        </div>
                        <div class="profile-pic">
                            <img src="icons/person3.svg" />
                        </div>
                        <div class="profile-text">Vishal Sharma</div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div>
                        <img src="icons/person3.svg" />
                        <div>
                            <div>Hi there,</div>
                            <div class="greeting">Hello, Vishal</div>
                        </div>
                    </div>
                    <div class="header-buttons">
                        <div class="header-button">New</div>
                        <div class="header-button">Upload</div>
                        <div class="header-button"><div>Share</div></div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="sidebar-group">
                    <div>
                        <img src="icons/view-dashboard.svg" />
                        <div class="logo-text">Dashboard</div>
                    </div>
                </div>
                <div class="sidebar-group">
                    <div>
                        <div>
                            <img src="icons/home.svg" />
                        </div>
                        <div>Home</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/card-account-details-outline.svg" />
                        </div>
                        <div>Profile</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/message-reply.svg" />
                        </div>
                        <div>Messages</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/clock-time-three.svg" />
                        </div>
                        <div>History</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/note-multiple.svg" />
                        </div>
                        <div>Tasks</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/account-group.svg" />
                        </div>
                        <div>Communities</div>
                    </div>
                </div>
                <div class="sidebar-group">
                    <div>
                        <div>
                            <img src="icons/cog.svg" />
                        </div>
                        <div>Settings</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/help-box.svg" />
                        </div>
                        <div>Support</div>
                    </div>
                    <div>
                        <div>
                            <img src="icons/shield-check.svg" />
                        </div>
                        <div>Privacy</div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="projects">
                    <div class="projects-heading">Your Projects</div>
                    <div class="projects-inner">
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Super Cool Project</div>
                                <div class="proj-text">
                                    Sed tempus ut lacus ut scelerisque.
                                    Suspendisse sollicitudin nibh erat, id
                                    facilisis fells accumsan nec.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Less Cool Project</div>
                                <div class="proj-text">
                                    Nullam condimentum ipsum ut lectus vehicula
                                    consectetur. Quisque sed dolor tincidunt,
                                    consectetur sapien et, facilisis dolor. Duis
                                    sem purus, dignissim ut sapien in, varius
                                    pellentesque lacus.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Impossible App</div>
                                <div class="proj-text">
                                    In hac habitasse platea dictumst. Vivamus 1
                                    dictum rutrum arcu, a placerat velit
                                    sagittis id.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Easy Peasy App</div>
                                <div class="proj-text">
                                    Etiam cursus eros ac efficitur fringilla.
                                    Vestibulum dignissim urns eget accumsan
                                    aliquam. Curabitur dignissim nisi in tortor
                                    commodo, ac bibendum magna tincidunt.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Ad Blocker</div>
                                <div class="proj-text">
                                    Quisque eget rutrum nisl. Nam augue justo,
                                    cursus vitae metus vel, pharetra hendrerit
                                    fells. Aliquam sed malesuada eros.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                        <div class="proj-card">
                            <div>
                                <div class="proj-title">Money Maker</div>
                                <div class="proj-text">
                                    Praesent convallis, libero quis congue
                                    elementum, nunc ante faucibus sapien, ac
                                    scelerisque tortor purus sit amet ex.
                                    Pellentesque mollis nec sem vel aliquam.
                                </div>
                            </div>
                            <div class="proj-footer">
                                <img
                                    src="icons/star-plus-outline.svg"
                                    alt="star"
                                />
                                <img
                                    src="icons/eye-plus-outline.svg"
                                    alt="add to wishlist"
                                />
                                <img
                                    src="icons/share-variant-outline.svg"
                                    alt="share"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="aside">
                    <div>
                        <div class="ann-heading">Announcements</div>
                        <div class="announcements">
                            <div class="announcement">
                                <div class="ann-title">Site Maintenance</div>
                                <div class="ann-text">
                                    Vestibulum condimentum tellus lacus, in
                                    accumsan elit maximus ac. Donec hendrerit
                                    sodales congue...
                                </div>
                            </div>
                            <div class="announcement">
                                <div class="ann-title">Community Share Day</div>
                                <div class="ann-text">
                                    Nam vel lectus tincidunt, rutrum nulla eu,
                                    ornare libero. Aliquam dictum accumsan
                                    porttitor...
                                </div>
                            </div>
                            <div class="announcement">
                                <div class="ann-title">
                                    Updated Privacy Policy
                                </div>
                                <div class="ann-text">
                                    Phasellus efficitur nisi eget elit
                                    consectetur, eget condimentum ante auctor.
                                    Cras fringilla sagittis sem in mattis...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="trending-heading">Trending</div>
                        <div class="trending-outer">
                            <div class="trending">
                                <div class="trending-logo">
                                    <img src="icons/person3.svg" />
                                </div>
                                <div class="trending-content">
                                    <div class="trending-username">tegan</div>
                                    <div class="trending-text">
                                        World Peace Builder
                                    </div>
                                </div>
                            </div>
                            <div class="trending">
                                <div class="trending-logo">
                                    <img src="icons/person2.svg" />
                                </div>
                                <div class="trending-content">
                                    <div class="trending-username">morgan</div>
                                    <div class="trending-text">
                                        Super Cool Project
                                    </div>
                                </div>
                            </div>
                            <div class="trending">
                                <div class="trending-logo">
                                    <img src="icons/person4.svg" />
                                </div>
                                <div class="trending-content">
                                    <div class="trending-username">kendal</div>
                                    <div class="trending-text">
                                        Life Changing App
                                    </div>
                                </div>
                            </div>
                            <div class="trending">
                                <div class="trending-logo">
                                    <img src="icons/person1.svg" />
                                </div>
                                <div class="trending-content">
                                    <div class="trending-username">alex</div>
                                    <div class="trending-text">
                                        No Traffic Maker
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
