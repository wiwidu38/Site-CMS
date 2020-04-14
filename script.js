$(function(){

    //Afficher le level en haut a droite
    setLevelProgression(54)
    
})

function setLevelProgression(xp){
    var circle = new ProgressBar.Circle('#progress', {
        color: '#FCB03C',
        strokeWidth: 3,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 200
    })
    circle.setText('Lv ' + Math.floor(getLevelFromXp(xp)))
    circle.animate(getProgressionFromXp(xp))    
}

function getLevelFromXp(xp){
    return xp/10
}

function getProgressionFromXp(xp){
    return getLevelFromXp(xp) % 1
}