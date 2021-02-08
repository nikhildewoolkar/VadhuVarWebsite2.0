from . import views
# from .views import *
from django.urls import path
urlpatterns=[
    path("",views.home,name="home"),
    path("home/",views.home,name="home"),
    # path("term_com/",views.term_com,name="term_com"),
    # path("r20/",views.r20,name="r20"),
    # path("r21/",views.r21,name="r21"),
    # path("temp/",views.temp,name="temp"),
    # path("index/",views.index,name="index"),
    # path("privacy/",views.privacy,name="privacy"),
    # path("needverify/",views.needverify,name="needverify"),
    # path("membership/",views.membership,name="membership"),
    # path("aboutus/",views.aboutus,name="aboutus"),
    # path("forgotpassword-NA/",views.forgotpassword-NA,name="forgotpassword-NA"),
]