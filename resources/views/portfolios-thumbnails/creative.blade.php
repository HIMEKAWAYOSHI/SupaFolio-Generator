
<div class="thumb-creative">
    <div class="tc-header">
        
        @if ($portfolio->profile_picture)
            <img src="{{ $portfolio->profile_picture }}" alt="">
        @else
            <div class="tc-avatar"></div>
        @endif

        <div class="tc-name">
            <p>{{$portfolio->full_name}}</p>
        </div>
        
    </div>

    <div class="tc-content">
        <div class="tc-about">
            <div class="tc-title">A Little About Me</div>
            <div class="tc-line"></div>
            <div class="tc-line tc-short"></div>
        </div>

        <div class="tc-title">My Skills</div>
        <div class="tc-skills">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="tc-title">Selected Projects</div>
        <div class="tc-projects">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<style>
.thumb-creative {
    min-height: 260px;
    background: #fff7eb;
    color: #45304e;
    font-family: Arial, sans-serif;
    overflow: hidden;
}
.tc-header {
    position: relative;
    text-align: center;
    padding: 17px 10px;
    background: #f4dfc8;
}

.tc-header img,
.tc-avatar {
    position: relative;
    width: 35px;
    height: 35px;
    object-fit: cover;
    border-radius: 12px;
    background: #d9b3d8;
    display: block;
    margin: 0 auto 7px;
}
.tc-name {
    font-size: 13px;
    font-weight: bold;
}

.tc-content {
    padding: 12px;
}
.tc-about {
    padding: 9px;
    border-left: 3px solid #d78eaa;
    background: #fffdf8;
}
.tc-title {
    font-size: 10px;
    font-weight: bold;
    margin: 7px 0;
}
.tc-line {
    height: 4px;
    width: 90%;
    background: #e8d8e3;
    border-radius: 4px;
    margin: 5px 0;
}
.tc-short { width: 60%; }
.tc-skills {
    display: flex;
    gap: 5px;
}
.tc-skills span {
    width: 35px;
    height: 12px;
    background: #e9c9df;
    border-radius: 8px;
}
.tc-projects {
    display: flex;
    gap: 7px;
}
.tc-projects div {
    height: 28px;
    flex: 1;
    border-radius: 8px;
    background: #f0d4bd;
}
</style>
