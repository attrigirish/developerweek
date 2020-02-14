from django.contrib import admin
from django.urls import path
from django.conf.urls.static import static
from django.conf import settings


from administrator import views as administrator
from moderator import views as moderator
from main import views as main
from user import views as user


urlpatterns = [
    path('admin/', admin.site.urls),

    path('', main.Index),
    path('post/<int:id>/', main.DisplayPost),
    
    path('user/register/', user.Register),
    path('user/login/', user.Login),
    path('user/post/create/', user.CreatePost),
]

urlpatterns=urlpatterns+static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)

